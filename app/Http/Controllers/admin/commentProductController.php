<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\CommentProduct;
use App\User;
class commentProductController extends Controller
{
    public function listComPro(){
    	$comPro= CommentProduct::paginate(20);
    	return view('admin.comment.listComPro',['comPro'=>$comPro]);
    }
    public function getAdd(){
    	$user= User::all();
    	$product= Product::all();
    	return view('admin.comment.addComPro',['user'=>$user,'product'=>$product]);
    }
    // do add
    public function postAdd(Request $request){
    	//check
    	$this->validate($request,
    	[
    		'NoiDung'=>'required|min:3|max:500'
    	],
    	[
    		'NoiDung.required'=>'Bạn chưa nhập comment!!?',
    		'NoiDung.min'=>'Comment phải trên 3 ký tự',
    		'NoiDung.max'=>'Comment không được quá 500 ký tự'
    	]);

    	$idUser= $request->User;
    	$email= User::where('id',$idUser)->select('email')->first();
    	$ten= User::where('id',$idUser)->select('name')->first();
    	
    	$comPro= new CommentProduct();
    	//add mysql
    	$comPro->idUser= $idUser;
    	$comPro->idPro= $request->Product;
    	$comPro->ten= $ten;
    	$comPro->email=$email;
    	$comPro->noidung=$request->NoiDung;
    	// save
    	$comPro->save();
    	return redirect('admin/comment-product/add')->with('thongbao','Thêm Comment thành công');
    }

    public function getEdit($id)
    {
    	$comPro= CommentProduct::find($id);
    	$user= User::all();
    	$product= Product::all();
    	return view('admin.comment.editComPro',['comPro'=>$comPro,'user'=>$user,'product'=>$product]);
    }

    public function postEdit(Request $request,$id)
    {
    	//check
    	$this->validate($request,
    	[
    		'NoiDung'=>'required|min:3|max:500'
    	],
    	[
    		'NoiDung.required'=>'Bạn chưa nhập comment!!?',
    		'NoiDung.min'=>'Comment phải trên 3 ký tự',
    		'NoiDung.max'=>'Comment không được quá 500 ký tự'
    	]);

    	$idUser= $request->User;
    	$email= User::where('id',$idUser)->select('email')->first();
    	$ten= User::where('id',$idUser)->select('name')->first();
    	
    	$comPro= CommentProduct::find($id);
    	//add mysql
    	$comPro->idUser= $idUser;
    	$comPro->idPro= $request->Product;
    	$comPro->ten= $ten;
    	$comPro->email=$email;
    	$comPro->noidung=$request->NoiDung;
    	// save
    	$comPro->save();
    	return redirect('admin/comment-product/add')->with('thongbao','Sửa Comment thành công');
    }

    public function getDelete($id){
        $comPro= CommentProduct::find($id);
        $comPro->delete();
        return redirect('admin/comment-blog/list')->with('thongbao','Xóa comment thành công');
    }
}
