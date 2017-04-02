<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Product;
class brandController extends Controller
{
    public function listBrand(){
    	$brand= Brand::paginate(10);
    	return view('admin.brand.list',['brand'=>$brand]);
    }
    public function getAdd(){
    	return view('admin.brand.add');
    }
    public function postAdd(Request $request){
    	// kiểm tra biến truyền đến
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150|unique:brand,ten'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Brand mới!',
    			'Ten.min'=>'Brand name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Brand phải có độ dài nhỏ hơn 150 ký tự',
                'Ten.unique'=>'Đã có nhãn hiệu này'
    		]);
    	// khởi tạo đối tượng rỗng để lưu vào csdl
    	$brand= new Brand();
    	$brand->ten= $request->Ten;
    	$brand->tenkodau= str_slug($request->Ten);
    	$brand->save();
    	return redirect('admin/brand/add')->with('thongbao','Add Brand Successfully');
    }

    public function getEdit($id){
    	$brand= Brand::find($id);
    	return view('admin.brand.edit',['brand'=>$brand]);
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Brand mới!',
    			'Ten.min'=>'Brand name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Brand phải có độ dài nhỏ hơn 150 ký tự'
    		]);
    	$brand= Brand::find($id);
    	$brand->ten= $request->Ten;
    	$brand->tenkodau= str_slug($request->Ten);
    	$brand->save();
    	return redirect('admin/brand/edit/'.$id)->with('thongbao','Edit Brand Successfully');
    }

    public function getDelete($id){
    	$brand=Brand::find($id);
    	$product=Product::where('idBrand',$id)->get();
    	if(count($product)==0){ 
    		$brand->delete();
    		return redirect('admin/brand/list')->with('thongbao','Delete Brand Successfully');
    	}
    	else{
    		return redirect('admin/brand/list')->with('error','Delete Failed, It has Product');
    	}
    }
}
