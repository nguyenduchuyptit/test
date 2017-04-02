<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
class categoryController extends Controller
{
    public function listCategory(){
    	$category= Category::paginate(10);
    	return view('admin.category.list',['category'=>$category]);
    }

    public function getAdd(){
    	return view('admin.category.add');
    }
    public function postAdd(Request $request){
    	// kiểm tra biến truyền đến
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150|unique:brand,ten'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Category mới!',
    			'Ten.min'=>'Category name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Category phải có độ dài nhỏ hơn 150 ký tự',
                'Ten.unique'=>'Đã có Category này'
    		]);
    	// khởi tạo đối tượng rỗng để lưu vào csdl
    	$category= new Category();
    	$category->ten= $request->Ten;
    	$category->tenkodau= str_slug($request->Ten);
    	$category->save();
    	return redirect('admin/category/add')->with('thongbao','Add Category Successfully');
    }
    public function getEdit($id){
    	$category=Category::find($id);
    	return view('admin.category.edit',['category'=>$category]);
    }
    public function postEdit(Request $request,$id){
    	
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Category!',
    			'Ten.min'=>'Category name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Category phải có độ dài nhỏ hơn 150 ký tự'
    		]);
    	$category=Category::find($id);
    	$category->ten=$request->Ten;
    	$category->tenkodau=str_slug($request->Ten);
    	$category->save();
    	return redirect('admin/category/edit/'.$id)->with('thongbao','Edit Category Successfully');
    }
    public function getDelete($id){
    	$category=Category::find($id);
    	$subcate= SubCategory::where('idCate',$id)->get();
    	if(count($subcate)==0){
    		$category->delete();
    		return redirect('admin/category/list')->with('thongbao','Delete Category Successfully');
    	}
    	else{
    		return redirect('admin/category/list')->with('error','Delete Category Failed, It has SubCategory');
    	}
    }
}
