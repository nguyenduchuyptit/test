<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;
use App\Product;
class sub_cateController extends Controller
{
    public function listSubcate(){

    	$subcate=SubCategory::paginate(10);
    	return view('admin.sub_cate.list',['subcate'=>$subcate]);

    }
    public function getAdd(){
    	$category=Category::all();
    	return view('admin.sub_cate.add',['category'=>$category]);
    }
    public function postAdd(Request $request){
    	//bắt lỗi, nếu ng dùng k nhập vào hoặc nhập lung tung
    	//truyền vào 2 tham số,
    	//tham số 1 là các lỗi, tham số 2 là các thông báo hiển thị ra màn hình
    	$this->validate($request,
    	[
    	//check biến có tên là name
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		'Ten'=>'required|unique:sub_category,Ten|min:3|max:150',
    		'Category'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
    		'Ten.required'=>'Bạn chưa nhập SubCategory',
    		'Ten.unique'=>'SubCategory đã tồn tại',
    		'Ten.min'=>'SubCategory phải có độ dài trên 3 kí tự',
    		'Ten.max'=>'SubCategory phải có độ dài dưới 150 kí tự',
    		'Category.required'=>'Bạn chưa chọn Category'
    	]);
    	//tạo đối tượng thể loại
    	$subcate = new SubCategory();
    	//trỏ đến tên
    	$subcate->ten= $request->Ten;
    	// đổi về tên không dấu
		// Chạy cmd : composer  dumpautoload
    	$subcate->tenkodau= str_slug($request->Ten);
    	//bảng loại tin trỏ đến idCategory = dữ liệu từ name=Category gửi đến request
    	$subcate->idCate= $request->Category;
    	//lưu vào csdl
    	$subcate->save();
    	// chuyển về trang them
    	return redirect('admin/sub-category/add')->with('thongbao','Add Category Successfully');
    }
    public function getEdit($id){
    	$subcate=SubCategory::find($id);
    	$category=Category::all();
    	return view('admin.sub_cate.edit',['subcate'=>$subcate,'category'=>$category]);
    }
    public function postEdit(Request $request,$id){
    	
    	$this->validate($request,
    	[
    	//check biến có tên là name
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		'Ten'=>'required|unique:sub_category,Ten|min:3|max:150',
    		'Category'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
    		'Ten.required'=>'Bạn chưa nhập SubCategory',
    		'Ten.unique'=>'SubCategory đã tồn tại',
    		'Ten.min'=>'SubCategory phải có độ dài trên 3 kí tự',
    		'Ten.max'=>'SubCategory phải có độ dài dưới 150 kí tự',
    		'Category.required'=>'Bạn chưa chọn Category'
    	]);

    	$subcate=SubCategory::find($id);
    	$subcate->ten=$request->Ten;
    	$subcate->tenkodau=str_slug($request->Ten);
    	$subcate->idCate= $request->Category;
    	$subcate->save();
    	return redirect('admin/sub-category/edit/'.$id)->with('thongbao','Edit SubCategory Successfully');
    }
    public function getDelete($id){
    	$subcate=SubCategory::find($id);
    	$product = Product::where('idSubCate',$id)->get();
    	if(count($product)==0){
    		$subcate->delete();
    		return redirect('admin/sub-category/list')->with('thongbao','Delete Category Successfully');
    	}
    	else{
    		return redirect('admin/sub-category/list')->with('error','Delete SubCategory Failed, It has Product');
    	}
    }
}
