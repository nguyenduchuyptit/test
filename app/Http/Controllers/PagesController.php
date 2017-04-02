<?php

namespace App\Http\Controllers;

//use Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\SubCategory;
use App\Slide;
use App\SlideAds;
use App\Product;
use App\Footer;
use App\User;
use App\Blog;
use App\CommentBlog;
use App\CommentProduct;
use App\Customer;
use App\CustomOrder;
use DB;
use Mail;
use Cart;
use Session;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
	function __construct(){
		$category= Category::all();
    	$brand=Brand::all();
    	$slide=Slide::orderBy('id','desc')->take(3)->get();
    	$slideads= SlideAds::orderBy('id','asc')->first();
    	$slideads2=SlideAds::orderBy('id','desc')->first();
    	$product= Product::orderBy('id','desc')->take(6)->get();
    	$footer= Footer::all();
    	view()->share('category',$category);
    	view()->share('brand',$brand);
    	view()->share('slide',$slide);
    	view()->share('slideads',$slideads);
    	view()->share('footer',$footer);
    	view()->share('slideads2',$slideads2);
    	view()->share('product',$product);
	}
    function home(){
    	return view('layouts.container');

    }
    // product
    function product(){
    	$product=Product::orderBy('id','desc')->paginate(12);
    	return view('pages.products',['product'=>$product]);
    }
    function product_detail($tenkodau,$id)
    {
    	$procheck=Product::where('id',$id)->where('tenkodau',$tenkodau)->first();
        
    	if(count($procheck)!=0)
    	{
            // đếm lượt xem
            $view=$procheck->soluotxem;
            if(!Session::has('idProduct'.$id))
            {
                $view++;
                $procheck->soluotxem=$view;
                $procheck->save();
                Session::put('idProduct'.$id,$id);
            }
            
            //lấy cùng tag 
            $brand2=Brand::where('id',$procheck->idBrand)->select('id')->first();
            $proBrand=Product::where('idBrand',$brand2->id)->where('id','!=',$id)->take(4)->get();
            //lấy cùng price
            $proPrice= Product::where('gia',$procheck->gia)->where('id','!=',$id)->take(4)->get();
            //lấy cùng category
            $subcate2=SubCategory::where('id',$procheck->idSubCate)->select('id')->first();
            $proSub=Product::where('idSubCate',$subcate2->id)->where('id','!=',$id)->take(4)->get();
            $comment= CommentProduct::where('idPro',$id)->orderBy('id','desc')->take(20)->get();
    		return view('pages.product-detail',['procheck'=>$procheck,'proBrand'=>$proBrand,'proPrice'=>$proPrice,'proSub'=>$proSub,'comment'=>$comment]);
    	}
    	else{
    		return redirect('product');
    	}
    }

    //category
    function category($tenkodau,$id){
    	$subcheck= SubCategory::where('id','=',$id)->where('tenkodau','=',$tenkodau)->get();
    	if(count($subcheck)!=0)
    	{
	    	$product3=Product::where('idSubCate',$id)->orderBy('id','desc')->paginate(12);
	    	return view('pages.category',['product3'=>$product3]);
    	}
    	else
    	{
    		return redirect('product');
    	}
    }

    // brand
    function brand($tenkodau,$id)
    {
    	$bracheck= Brand::where('id',$id)->where('tenkodau',$tenkodau)->get();
    	if(count($bracheck)!=0)
    	{
    		$product4=Product::where('idBrand',$id)->orderBy('id','desc')->paginate(12);
    		return view('pages.brand',['product4'=>$product4]);
    	}
    	else
    	{
    		return redirect('product');
    	}
    }
    // login
    function getLogin()
    {
        return view('pages.login');
    }
    function postLogin(Request $request){
        //check validate
        $this->validate($request,
        [
            'email'=>'required|min:8|max:200',
            'password'=>'required|min:6|max:64|alpha_dash'
        ],
        [
            'email.required'=>'Bạn chưa nhập Email',
            'email.min'=>'Email phải trên 8 ký tự',
            'email.max'=>'Email quá dài',
            'password.required'=>'Đừng bỏ trống password',
            'password.min'=>'Password phải trên 6 ký tự',
            'password.alpha_dash'=>'Password chứa ký tự đặc biệt'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $remember = $request->remember;
            if (!empty($remember)){
                Auth::login(Auth::User()->id,true);
            }
            return redirect('home');
        }
        else{
            return redirect('login.html')->with('error','Sai Email hoặc Password!!');
        }
    }
    function postSignup(Request $request){
        $this->validate($request,
        [
            'Ten'=>'min:3|max:200',
            'Email'=>'min:8|max:300|unique:users,email',
            'Password'=>'min:6|max:200|alpha_dash',
            'PasswordAgain'=>'same:Password'
        ],
        [
            'Ten.min'=>'Tên của bạn phải dài trên 3 ký tự',
            'Ten.max'=>'Tên không được dài quá 200 ký tự',
            'Email.min'=>'Email phải dài trên 8 ký tự',
            'Email.max'=>'Email không quá 300 ký tự',
            'Email.unique'=>'Email này đã tồn tại, vui lòng chọn email khác',
            'Password.min'=>'Password không dưới 6 ký tự',
            'Password.max'=>'Password ngắn hơn 200 ký tự',
            'Password.alpha_dash'=>'Password không được chứa ký tự đặc biệt',
            'PasswordAgain.same'=>'Password nhập lại chưa chính xác'
        ]);

        $user= new User();
        $user->name= $request->Ten;
        $user->email=$request->Email;
        $user->password=bcrypt($request->Password);
        $user->quyen=0;
        $user->save();

        if(Auth::attempt(['email' =>$request->Email, 'password' => $request->Password]))
        {
            return redirect('home')->with('success','Đăng ký thành công ^^');
        }
        
    }
    function getProfile(){
        return view('pages.profile');
    }
    function postProfile(Request $request){
        $this->validate($request,
        [
            'Ten'=>'min:3|max:200'
        ],
        [
            'Ten.min'=>'Tên của bạn phải dài trên 3 ký tự',
            'Ten.max'=>'Tên không được dài quá 200 ký tự'
        ]);

        $user= Auth::User();
        $user->name=$request->Ten;
        if($request->changePassword=="on")
        {
            $this->validate($request,
            [
                'Password'=>'min:6|max:200|alpha_dash',
                'PasswordAgain'=>'same:Password'
            ],
            [
                'Password.min'=>'Password không dưới 6 ký tự',
                'Password.max'=>'Password ngắn hơn 200 ký tự',
                'Password.alpha_dash'=>'Password không được chứa ký tự đặc biệt',
                'PasswordAgain.same'=>'Password nhập lại chưa chính xác'
            ]);
            $user->password=bcrypt($request->Password);
        }
        $user->save();
        return redirect('profile.html')->with('thongbao','Edit Your Profile Successfully');
    }

   

    function logout()
    {
        Auth::logout();
        return view('pages.logout');
    }

    //blog
    function blog()
    {
        $blog= Blog::orderBy('id','desc')->paginate(3);
        return view('pages.blog',['blog'=>$blog]);
    }

    // blod detail
    function blog_detail($tenkodau,$id, Request $request){
        $blog=Blog::where('tieudekodau',$tenkodau)->where('id',$id)->first();
        
        // đếm lượt xem
        $view=$blog->soluotxem;
        
        if(!Session::has('idBlog'.$id))
        {
            $view++;
            $blog->soluotxem=$view;
            $blog->save();
            Session::put('idBlog'.$id, $id);
        }

        $prev=Blog::where('id','>',$blog->id)->min('id');
        $next= Blog::where('id','<',$blog->id)->max('id');
        $blogprev= Blog::where('id',$prev)->first();
        $blognext= Blog::where('id',$next)->first();

        if(count($blog)!=0)
        {
            $comment=CommentBlog::where('idBlog',$id)->orderBy('id','desc')->take(20)->get();
            return view('pages.blog-detail',['blog'=>$blog,'blogprev'=>$blogprev,'blognext'=>$blognext,'comment'=>$comment])->with('prev',$prev)->with('next',$next);
        }
        else
        {
            return redirect('blog.html');
        }

    }
    // comment blog
    function commentBlog($tenkodau,$id,Request $request){
        $user=Auth::User();
        $comment = new CommentBlog();
        $comment->idUser= $user->id;
        $comment->idBlog= $request->idBlog;
        $comment->ten= $user->name;
        $comment->email= $user->email;
        $comment->noidung= $request->noidung;
        $comment->save();
        return redirect('blog-detail/'.$tenkodau.'-'.$id.'.html');
    } 
    function commentProduct($tenkodau,$id,Request $request)
    {
        $user=Auth::User();
        $comment = new CommentProduct();
        $comment->idUser= $user->id;
        $comment->idPro= $request->idPro;
        $comment->ten= $user->name;
        $comment->email= $user->email;
        $comment->noidung= $request->review;
        $comment->save();
        return redirect('product-detail/'.$tenkodau.'-'.$id.'.html');
    }

    //cart
    function cart(){
        $content= Cart::content();
        $subtotal= Cart::subtotal();
        $count= Cart::count();
        //$vat= $subtotal*10/100; ,'vat'=>$vat
        return view('pages.cart',['content'=>$content,'subtotal'=>$subtotal,'count'=>$count]);
    }
    //cart
    function buy($tenkodau,$id)
    {
        $product_buy=Product::where('id',$id)->first();
        Cart::add(['id'=>$id,'name'=>$product_buy->ten,'price'=>$product_buy->gia,'qty'=>1,'options'=>['img'=>$product_buy->hinh]]);
        $content= Cart::content();
        return redirect('cart.html');
    }
    //cart buy product-detail
    function buyProduct($tenkodau,$id,Request $request)
    {
        if(isset($request->number))
        {
            $buyProduct= Product::where('id',$id)->first();
            Cart::add(['id'=>$id,'name'=>$buyProduct->ten,'price'=>$buyProduct->gia,'qty'=>$request->number,'options'=>['img'=>$buyProduct->hinh]]);
            $content=Cart::content();
            return redirect('cart.html');
        }
    }
   
    //delete product in cart
    function delete($id)
    {
        Cart::remove($id);
        return redirect('cart.html');
    }
    //delete all cart
    function deleteAll(){
        Cart::destroy();
        return redirect('cart.html');
    }
    //check out
    function checkout(){
        $content= Cart::content();
        $subtotal= Cart::subtotal();
        return view('pages.checkout',['content'=>$content,'subtotal'=>$subtotal]);
    }

    function postcheckout(Request $request){
        $pass1= $request->Password;
        $pass2= $request->PasswordAgain;
        if(Auth::attempt(['email' => Auth::User()->email,'password' => $pass2]) && $pass1==$pass2)
        {
            $this->validate($request,
            [
                'Phone'=>'min:8|max:20|alpha_num'
            ],
            [
                'Phone.min'=>'Số điện thoại bạn nhập không đúng!',
                'Phone.max'=>'Số điện thoại bạn nhập không đúng!',
                'Phone.alpha_num'=>'Số điện thoại bạn nhập không đúng!'
            ]);

            // lưu
            $customer= new Customer();
            $customer->idUser= Auth::User()->id;
            if($request->Company)
            {
                $customer->company=$request->Company;
            }
            else{
                $customer->company="";
            }
            $customer->address=$request->Address;
            $customer->message=$request->message;
            if($request->Title)
            {
                $customer->title=$request->Title;
            }
            else{
                $customer->title="";
            }
            $customer->phone=$request->Phone;
            $customer->subtotal= Cart::subtotal();
            $customer->status=0;
            $customer->save();

            $customer2 = Customer::orderBy('id','desc')->select('id')->first();
            
            foreach(Cart::content() as $row){
                $order=new CustomOrder();
                $order->idCustom= $customer2->id;
                $order->idPro= $row->id;
                $order->qty= $row->qty;
                $order->price=$row->price;
                $order->total= $row->qty*$row->price;
                $order->save();
            }
            Cart::destroy();
            return redirect('checkout.html')->with('success','ok');
        }
        
        else
        {
            return redirect('checkout.html')->with('thongbao','Mật khẩu bạn nhập chưa chính xác!');
        }

    }

    function getOrder(){
        if(!Auth::User())
        {
            return redirect('product.html');
        }
        else{

            $idUser= Auth::User()->id;
            //$infor= Customer::where('idUser',$idUser)->orderBy('id','desc')->first();
            $bought = CustomOrder::whereHas('Customer', function ($query) {
                $query->where('idUser',Auth::User()->id);
            })->get();
            //$sum= Customer::where('idUser',$idUser)->sum('subtotal');
            return view('pages.my-order',['bought'=>$bought]);
        }
    }

    function getViewOrder($id){
        if(!Auth::User())
        {
            return redirect('cart.html');
        }
        else{
            $CustomOrder=CustomOrder::find($id);
            
            if(count($CustomOrder)>0)
            {
                $idUser = $CustomOrder->customer->user->id;
                if($idUser!=Auth::User()->id)
                {
                    return redirect('myorder.html');
                }
                else{
                    return view('pages.view-order',['CustomOrder'=>$CustomOrder]);
                }
            }
            else{
                return redirect('myorder.html');
            }
        }
    }

    // delete order
    function getDeleteOrder($id){
        if(!Auth::User())
        {
            return redirect('cart.html');
        }
        else{
            $CustomOrder=CustomOrder::find($id);
            if(count($CustomOrder)>0)
            {
                $idUser = $CustomOrder->customer->user->id;
                if($idUser!=Auth::User()->id)
                {
                    return redirect('myorder.html');
                }
                else{
                    $CustomOrder->delete();
                    return redirect('myorder.html')->with('success','Hủy đơn hàng thành công');
                }
            }
            else{
                return redirect('myorder.html');
            }
        }
    }
    
    // end cart

    // contact
    function getContact(){
        return view('pages.contact');
    }
    // ajax Product
    function postProduct(Request $request){
        if($request->ajax())
        {
            if($request->price_range)
                $priceArr=explode(',',$request->price_range);
                $productArr = DB::table('product')->whereBetween('gia', array($priceArr[0], $priceArr[1]))->orderBy('gia','asc')->paginate(12);
                foreach ($productArr as $prod) { 

                    echo '<div class="col-sm-4 col-md-4">';
                        echo '<div class="product-image-wrapper">';
                            echo '<div class="single-products">';
                                echo '<div class="productinfo text-center">';
                                    echo '<img src="upload/product/'.$prod->hinh.'" alt="" />';
                                    echo '<h2>$'.$prod->gia.'</h2>';
                                    echo '<p>'. $prod->ten .'</p>';
                                    echo '<a href="product-detail/"'. $prod->tenkodau."-".$prod->id.".html " .'class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                echo '</div>';
                                echo '<div class="product-overlay">';
                                    echo '<div class="overlay-content">';
                                        echo '<h2>$'. $prod->gia .'</h2>';
                                        echo '<p>'. $prod->ten .'</p>';
                                        echo "<a class='btn btn-default add-to-cart' href='product-detail/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-info'></i>View Detail</a>";
                                            echo'<br>';
                                        echo "<a class='btn btn-default add-to-cart' href='buy/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
                                    echo '</div>';

                                   //  echo 'if ($prod->noibat==1 && $prod->soluong > 50)
                                   //          echo '<img src="images/home/new.png" class="new" alt="" />
                                   //  echo '@endif
                                   //  echo '@if($prod->soluong <=50 && $prod->noibat==0)
                                   //          echo '<img src="images/home/sale.png" class="new" alt="" />
                                   // echo ' echo '@endif
                                            
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="choose">';
                                echo '<ul class="nav nav-pills nav-justified">';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>';
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                   
                }
                    // echo "<div class='col-sm-12 col-md-12 text-center page-new'>";
                    //     echo $productArr->render();
                    // echo "</div>";
        }
    }
    // ajax Brand
    function postBrand(Request $request){
        if($request->ajax())
        {
            if($request->price_range&& $request->idBrand)
            {
                $priceArr=explode(',',$request->price_range);
                $idBrand= $request->idBrand;
                $productArr = DB::table('product')->where('idBrand',$idBrand)->whereBetween('gia', array($priceArr[0], $priceArr[1]))->orderBy('gia','asc')->paginate(12);
                foreach ($productArr as $prod) { 
                    echo '<div class="col-sm-4 col-md-4">';
                        echo '<div class="product-image-wrapper">';
                            echo '<div class="single-products">';
                                echo '<div class="productinfo text-center">';
                                    echo '<img src="upload/product/'.$prod->hinh.'" alt="" />';
                                    echo '<h2>$'.$prod->gia.'</h2>';
                                    echo '<p>'. $prod->ten .'</p>';
                                    echo '<a href="product-detail/"'. $prod->tenkodau."-".$prod->id.".html " .'class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                echo '</div>';
                                echo '<div class="product-overlay">';
                                    echo '<div class="overlay-content">';
                                        echo '<h2>$'. $prod->gia .'</h2>';
                                        echo '<p>'. $prod->ten .'</p>';
                                        echo "<a class='btn btn-default add-to-cart' href='product-detail/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-info'></i>View Detail</a>";
                                            echo'<br>';
                                        echo "<a class='btn btn-default add-to-cart' href='buy/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
                                    echo '</div>';

                                   //  echo 'if ($prod->noibat==1 && $prod->soluong > 50)
                                   //          echo '<img src="images/home/new.png" class="new" alt="" />
                                   //  echo '@endif
                                   //  echo '@if($prod->soluong <=50 && $prod->noibat==0)
                                   //          echo '<img src="images/home/sale.png" class="new" alt="" />
                                   // echo ' echo '@endif
                                            
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="choose">';
                                echo '<ul class="nav nav-pills nav-justified">';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>';
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            }   
        }
    }
    // ajax Category
    function postCategory(Request $request)
    {
        if($request->ajax())
        {
            if($request->price_range && $request->idSubCate)
            {
                $priceArr=explode(',',$request->price_range);
                $idSubCate=$request->idSubCate;

                $productArr=DB::table('product')->where('idSubCate',$idSubCate)->whereBetween('gia',array($priceArr[0],$priceArr[1]))->orderBy('gia','asc')->paginate(12);

                foreach ($productArr as $prod) { 
                    echo '<div class="col-sm-4 col-md-4">';
                        echo '<div class="product-image-wrapper">';
                            echo '<div class="single-products">';
                                echo '<div class="productinfo text-center">';
                                    echo '<img src="upload/product/'.$prod->hinh.'" alt="" />';
                                    echo '<h2>$'.$prod->gia.'</h2>';
                                    echo '<p>'. $prod->ten .'</p>';
                                    echo '<a href="product-detail/"'. $prod->tenkodau."-".$prod->id.".html " .'class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                echo '</div>';
                                echo '<div class="product-overlay">';
                                    echo '<div class="overlay-content">';
                                        echo '<h2>$'. $prod->gia .'</h2>';
                                        echo '<p>'. $prod->ten .'</p>';
                                        echo "<a class='btn btn-default add-to-cart' href='product-detail/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-info'></i>View Detail</a>";
                                            echo'<br>';
                                        echo "<a class='btn btn-default add-to-cart' href='buy/".$prod->tenkodau."-".$prod->id.".html'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
                                    echo '</div>';

                                   //  echo 'if ($prod->noibat==1 && $prod->soluong > 50)
                                   //          echo '<img src="images/home/new.png" class="new" alt="" />
                                   //  echo '@endif
                                   //  echo '@if($prod->soluong <=50 && $prod->noibat==0)
                                   //          echo '<img src="images/home/sale.png" class="new" alt="" />
                                   // echo ' echo '@endif
                                            
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="choose">';
                                echo '<ul class="nav nav-pills nav-justified">';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
                                    echo '<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>';
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            }
        }
    }

    // search
    function search(Request $request){
        $search= $request->search;
        $product= Product::where('ten','like',"%$search%")->orWhere('tenkodau','like',"%$search%")->paginate(12);
        return view('pages.search',['product'=>$product,'search'=>$search]);
    }
}
