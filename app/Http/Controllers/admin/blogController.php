<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use App\CommentBlog;
class blogController extends Controller
{
    public function listBlog(){
    	$blog= Blog::paginate(10);
    	return view('admin.blog.list',['blog'=>$blog]);
    }
    // add
    public function getAdd(){
    	return view('admin.blog.add');
    }
    public function postAdd(Request $request){
    	//kiểm tra các dl khác
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:300|unique:blog,tieude',
            'TomTat' =>'required|min:10',
            'NoiDung'=>'required|min:10'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên Blog',
            'Ten.min'=>'Tiêu đề Blog phải lớn hơn 3 và nhỏ hơn 300 ký tự',
            'Ten.max'=>'Tiêu đề Blog phẩm phải lớn hơn 3 và nhỏ hơn 300 ký tự',
            'Ten.unique'=>'Đã có Blog này',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'TomTat.min'=>'Bạn chưa nhập đủ 10 ký tự',
            'NoiDung.required'=>'Bạn chưa nhập Nội dung',
            'NoiDung.min'=>'Nội dung quá ngắn, phải trên 10 ký tự'
        ]);

        //kiểm tra ảnh
        if($request->hasFile('Image'))
        {   
        	//check ảnh
            $file=$request->file('Image');
            // lấy đuôi file
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='png' && $duoi!='jpg' && $duoi!='jpeg')
            {
                return redirect('admin/blog/add')->with('error','Ảnh upload không hợp lệ');
            }
            //lấy tên ảnh
            $name=$file->getClientOriginalName();
            //đặt tên hình mới
            $hinh=str_random(4)."_".$name;
            //nếu đã tồn tại tên hình này thì đổi tên
            while(file_exists('upload/blog/'.$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/blog',$hinh);

            //đưa vào csdl
            $blog= new Blog();

            $blog->idUser=Auth::User()->id;
            $blog->tieude= $request->Ten;
            $blog->tieudekodau= str_slug($request->Ten);
            $blog->tomtat=$request->TomTat;
            $blog->noidung=$request->NoiDung;
            $blog->noibat= $request->NoiBat;
            $blog->hinh= $hinh;

            // save
            $blog->save();
            return redirect('admin/blog/add')->with('thongbao','Đã thêm Blog thành công');
        }
        else{
            return redirect('admin/blog/add')->with('error','Bạn chưa upload ảnh bài viết');
        }
    }
    // edit
    public function getEdit($id){
        $blog=Blog::find($id);
        return view('admin.blog.edit',['blog'=>$blog]);
    }

    public function postEdit(Request $request,$id){
        $blog= Blog::find($id);
        //kiểm tra các dl khác
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:300|unique:blog,tieude',
            'TomTat' =>'required|min:10',
            'NoiDung'=>'required|min:10'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên Blog',
            'Ten.min'=>'Tiêu đề Blog phải lớn hơn 3 và nhỏ hơn 300 ký tự',
            'Ten.max'=>'Tiêu đề Blog phải lớn hơn 3 và nhỏ hơn 300 ký tự',
            'Ten.unique'=>'Đã tên Blog này',
            'TomTat.required'=>'Bạn chưa nhập mô tả',
            'TomTat.min'=>'Bạn chưa nhập đủ 10 ký tự',
            'NoiDung.required'=>'Bạn chưa nhập Nội dung',
            'NoiDung.min'=>'Nội dung quá ngắn, phải trên 10 ký tự'
        ]);

        //kiểm tra ảnh
        if($request->hasFile('Image'))
        {   //lấy tên ảnh
            $file=$request->file('Image');
            // lấy đuôi file
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='png' && $duoi!='jpg' && $duoi!='jpeg')
            {
                return redirect('admin/blog/edit/'.$id)->with('error','Ảnh upload không hợp lệ');
            }
            //lấy tên ảnh
            $name=$file->getClientOriginalName();
            //đặt tên hình mới
            $hinh=str_random(4)."_".$name;
            //nếu đã tồn tại tên hình này thì đổi tên
            while(file_exists('upload/blog/'.$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/blog',$hinh);
            //kiểm tra ảnh cũ
            if($blog->hinh!='')
            {
                if(file_exists('upload/blog/'.$blog->hinh))
                    unlink('upload/blog/'.$blog->hinh);
            }

            //đưa vào csdl
            

            $blog->idUser=Auth::User()->id;
            $blog->tieude= $request->Ten;
            $blog->tieudekodau= str_slug($request->Ten);
            $blog->tomtat=$request->TomTat;
            $blog->noidung=$request->NoiDung;
            $blog->noibat= $request->NoiBat;
            $blog->hinh= $hinh;
            // save
            $blog->save();
            return redirect('admin/blog/edit/'.$id)->with('thongbao','Sửa Blog thành công');
            
        }
        else{
            
            $blog->idUser=Auth::User()->id;
            $blog->tieude= $request->Ten;
            $blog->tieudekodau= str_slug($request->Ten);
            $blog->tomtat=$request->TomTat;
            $blog->noidung=$request->NoiDung;
            $blog->noibat= $request->NoiBat;
            // save
            $blog->save();
            return redirect('admin/blog/edit/'.$id)->with('thongbao','Sửa Blog thành công');
        }

        
    }

    public function getDelete($id)
    {
        $blog = Blog::find($id);
        $comBlog= CommentBlog::where('idBlog',$id)->get();
        if(count($comBlog)==0)
        {
            if($blog->hinh!='')
            {
                if(file_exists('upload/blog/'.$blog->hinh))
                {
                    unlink('upload/blog/'.$blog->hinh);
                }
            }
            $blog->delete();
            return redirect('admin/blog/list')->with('thongbao','Xóa Blog thành công');
        }
        else
        {
            CommentBlog::where('idBlog',$id)->delete();
            if($blog->hinh!='')
            {
                if(file_exists('upload/blog/'.$blog->hinh))
                {
                    unlink('upload/blog/'.$blog->hinh);
                }
            }
            $blog->delete();
            return redirect('admin/blog/list')->with('thongbao','Xóa Blog thành công');
        }

    }
}
