<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
class slideController extends Controller
{
    public function listSlide(){
    	$slide=Slide::paginate(10);
    	return view('admin.slide.list',['slide'=>$slide]);
    }

    public function getAdd(){
    	return view('admin.slide.add');
    }

    public function postAdd(Request $request){
    	//bắt lỗi, nếu ng dùng k nhập vào hoặc nhập lung tung
    	//truyền vào 2 tham số,
    	//tham số 1 là các lỗi, tham số 2 là các thông báo hiển thị ra màn hình
    	$this->validate($request,
    	[
    	//check biến có tên là Ten
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		
            'Ten'=>'required|min:3|max:250|unique:Slide,Ten',
            'NoiDung'=>'required|min:10|max:300',
            'link'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
            'Ten.required'=>'Bạn chưa nhập Tên',
            'Ten.min'=>'Tên phải có độ dài trên 3 kí tự',
            'Ten.max'=>'Tên phải có độ dài dưới 250 kí tự',
    		'Ten.unique'=>'Tên đã tồn tại',
            'NoiDung.required'=>'Bạn chưa nhập Nội Dung',
    		'NoiDung.min'=>'Nội Dung phải có độ dài trên 10 kí tự',
    		'NoiDung.max'=>'Nội Dung phải có độ dài dưới 300 kí tự',
    		'link.required'=>'Bạn chưa điền link'
    	]);
    	//tạo đối tượng thể loại
    	$slide = new Slide();
    	

        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect('admin/slide/add')->with('error','Bạn chỉ được chọn ảnh thôi ^^');
            }
            //lấy tên hình cũ
            $name= $file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/slide',$hinh);
            //trỏ đến tên
	    	$slide->ten= $request->Ten;
	        $slide->noidung= $request->NoiDung;
	        $slide->link=$request->link;

            $slide->hinh=$hinh;
			//lưu vào csdl
            $slide->save();

    		// chuyển về trang add
    		return redirect('admin/slide/add')->with('thongbao','Thêm thành công');
        }
        else{
            return redirect('admin/slide/add')->with('error','Bạn chưa chọn ảnh ^^');
        }
    	
    }

    public function getEdit($id){
    	$slide= Slide::find($id);
    	return view('admin.slide.edit',['slide'=>$slide]);
    }

    public function postEdit(Request $request,$id)
    {
    	$slide= Slide::find($id);
    	//tham số 1 là các lỗi, tham số 2 là các thông báo hiển thị ra màn hình
    	$this->validate($request,
    	[
    	//check biến có tên là Ten
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		
            'Ten'=>'required|min:3|max:250|unique:Slide,Ten',
            'NoiDung'=>'required|min:10|max:300',
            'link'=>'required'
    	],
    	[
    		//nếu tên k điền thì truyền 1 thông báo
            'Ten.required'=>'Bạn chưa nhập Tên',
            'Ten.min'=>'Tên phải có độ dài trên 3 kí tự',
            'Ten.max'=>'Tên phải có độ dài dưới 250 kí tự',
    		'Ten.unique'=>'Tên đã tồn tại',
            'NoiDung.required'=>'Bạn chưa nhập Nội Dung',
    		'NoiDung.min'=>'Nội Dung phải có độ dài trên 10 kí tự',
    		'NoiDung.max'=>'Nội Dung phải có độ dài dưới 300 kí tự',
    		'link.required'=>'Bạn chưa điền link'
    	]);
    	//trỏ đến tên
    	$slide->ten= $request->Ten;
        $slide->noidung= $request->NoiDung;
        $slide->link=$request->link;

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect('admin/slide/edit/'.$id)->with('error','Bạn chỉ được chọn ảnh thôi ^^');
            }
            //lấy tên hình cũ
            $name= $file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/slide',$hinh);

            if($slide->hinh!='')
            {
                if(file_exists("upload/slide/".$slide->hinh))
                {
                    unlink("upload/slide/".$slide->hinh);
                }
            }

            $slide->hinh=$hinh;
        }
        $slide->save();
    	// // chuyển về trang them
    	return redirect('admin/slide/edit/'.$id)->with('thongbao','Edit Slide thành công');
    }
    public function getDelete($id){
        $slide= Slide::find($id);
        if($slide->hinh!='')
        {
            if(file_exists('upload/slide/'.$slide->hinh))
            {
                unlink('upload/slide/'.$slide->hinh);
            }
        }
        $slide->delete();
        return redirect('admin/slide/list')->with('thongbao','Xóa thành công');
    }
}
