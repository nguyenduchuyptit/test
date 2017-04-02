<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubFooter;
use App\Footer;
class sub_footerController extends Controller
{
    public function listSubFooter(){
    	$subfooter= SubFooter::paginate(10);
    	return view('admin.sub_footer.list',['subfooter'=>$subfooter]);
    }
    public function getAdd(){
    	$footer=Footer::all();
    	return view('admin.sub_footer.add',['footer'=>$footer]);
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
    		'Ten'=>'required|unique:sub_foot_category,Ten|min:3|max:150',
    		'Footer'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
    		'Ten.required'=>'Bạn chưa nhập SubFooter',
    		'Ten.unique'=>'SubFooter đã tồn tại',
    		'Ten.min'=>'SubFooter phải có độ dài trên 3 kí tự',
    		'Ten.max'=>'SubFooter phải có độ dài dưới 150 kí tự',
    		'Footer.required'=>'Bạn chưa chọn Footer Category'
    	]);
    	//tạo đối tượng thể loại
    	$subcate = new SubFooter();
    	//trỏ đến tên
    	$subcate->ten= $request->Ten;
    	// đổi về tên không dấu
		// Chạy cmd : composer  dumpautoload
    	$subcate->tenkodau= str_slug($request->Ten);
    	//bảng loại tin trỏ đến idFooter = dữ liệu từ name=Footer gửi đến request
    	$subcate->idFoot= $request->Footer;
    	//lưu vào csdl
    	$subcate->save();
    	// chuyển về trang them
    	return redirect('admin/sub-footer/add')->with('thongbao','Add Footer Successfully');
    }
    public function getEdit($id){
    	$subfooter=SubFooter::find($id);
    	$footer=Footer::all();
    	return view('admin.sub_footer.edit',['subfooter'=>$subfooter,'footer'=>$footer]);
    }
    public function postEdit(Request $request,$id){
    	
    	$this->validate($request,
    	[
    	//check biến có tên là name
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		'Ten'=>'required|unique:sub_foot_category,Ten|min:3|max:150',
    		'Footer'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
    		'Ten.required'=>'Bạn chưa nhập SubFooter',
    		'Ten.unique'=>'SubFooter đã tồn tại',
    		'Ten.min'=>'SubFooter phải có độ dài trên 3 kí tự',
    		'Ten.max'=>'SubFooter phải có độ dài dưới 150 kí tự',
    		'Footer.required'=>'Bạn chưa chọn Footer'
    	]);

    	$subcate=SubFooter::find($id);
    	$subcate->ten=$request->Ten;
    	$subcate->tenkodau=str_slug($request->Ten);
    	$subcate->idFoot= $request->Footer;
    	$subcate->save();
    	return redirect('admin/sub-footer/edit/'.$id)->with('thongbao','Edit SubFooter Successfully');
    }
    public function getDelete($id){
    	$subfooter=SubFooter::find($id);
		$subfooter->delete();
		return redirect('admin/sub-footer/list')->with('thongbao','Delete SubFooter Successfully');  	
    }
}
