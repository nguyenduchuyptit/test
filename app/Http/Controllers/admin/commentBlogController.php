<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommentBlog;
use App\Blog;
use App\User;
class commentBlogController extends Controller
{
    public function listComBlog(){
    	$comBlog= CommentBlog::paginate(20);
    	return view('admin.comment.listComBlog',['comBlog'=>$comBlog]);
    }
    public function getAdd(){
    	$user= User::all();
    	$blog= Blog::all();
    	return view('admin.comment.addComBlog',['user'=>$user,'blog'=>$blog]);
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
    	
    	$comBlog= new CommentBlog();
    	//add mysql
    	$comBlog->idUser= $idUser;
    	$comBlog->idBlog= $request->Blog;
    	$comBlog->ten= $ten;
    	$comBlog->email=$email;
    	$comBlog->noidung=$request->NoiDung;
    	// save
    	$comBlog->save();
    	return redirect('admin/comment-blog/add')->with('thongbao','Thêm Comment thành công');
    }

    public function getEdit($id)
    {
    	$comBlog= CommentBlog::find($id);
    	$user= User::all();
    	$blog= Blog::all();
    	return view('admin.comment.editComBlog',['comBlog'=>$comBlog,'user'=>$user,'blog'=>$blog]);
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
    	
    	$comBlog= CommentBlog::find($id);
    	//add mysql
    	$comBlog->idUser= $idUser;
    	$comBlog->idBlog= $request->Blog;
    	$comBlog->ten= $ten;
    	$comBlog->email=$email;
    	$comBlog->noidung=$request->NoiDung;
    	// save
    	$comBlog->save();
    	return redirect('admin/comment-blog/edit/'.$id)->with('thongbao','Sửa Comment thành công');
    }

    // delete
    public function getDelete($id){
        $comBlog= CommentBlog::find($id);
        $comBlog->delete();
        return redirect('admin/comment-blog/list')->with('thongbao','Xóa comment thành công');
    }
}
