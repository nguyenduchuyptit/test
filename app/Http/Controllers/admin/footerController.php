<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Footer;
use App\SubFooter;
class footerController extends Controller
{
    public function listFooter(){
    	$footer= Footer::paginate(10);
    	return view('admin.footer.list',['footer'=>$footer]);
    }
    public function getAdd(){
    	return view('admin.footer.add');
    }
    public function postAdd(Request $request){
    	// kiểm tra biến truyền đến
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Footer mới!',
    			'Ten.min'=>'Footer name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Footer phải có độ dài nhỏ hơn 150 ký tự'
    		]);
    	// khởi tạo đối tượng rỗng để lưu vào csdl
    	$footer= new Footer();
    	$footer->ten= $request->Ten;
    	$footer->tenkodau= str_slug($request->Ten);
    	$footer->save();
    	return redirect('admin/footer/add')->with('thongbao','Add Footer Successfully');
    }
    public function getEdit($id){
    	$footer=Footer::find($id);
    	return view('admin.footer.edit',['footer'=>$footer]);
    }
    public function postEdit(Request $request,$id){
    	
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:150'
    		],
    		[
    			'Ten.required'=>'Vui lòng nhập Footer!',
    			'Ten.min'=>'Footer name phải dài hơn 3 ký tự',
    			'Ten.max'=>'Footer phải có độ dài nhỏ hơn 150 ký tự'
    		]);
    	$footer=Footer::find($id);
    	$footer->ten=$request->Ten;
    	$footer->tenkodau=str_slug($request->Ten);
    	$footer->save();
    	return redirect('admin/footer/edit/'.$id)->with('thongbao','Edit Footer Successfully');
    }
    public function getDelete($id){
    	$footer=Footer::find($id);
    	$subcate= SubFooter::where('idFoot',$id)->get();
    	if(count($subcate)==0){
    		$footer->delete();
    		return redirect('admin/footer/list')->with('thongbao','Delete Footer Successfully');
    	}
    	else{
            SubFooter::where('idFoot',$id)->delete();
            
            $footer->delete();
            return redirect('admin/footer/list')->with('thongbao','Xóa thành công');
    	}
    }
}
