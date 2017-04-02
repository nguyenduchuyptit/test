<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SlideAds;
class adverController extends Controller
{
    public function listSlideAds(){
    	$slideads=SlideAds::paginate(10);
    	return view('admin.slide_ads.list',['slideads'=>$slideads]);
    }

    public function getAdd(){
    	return view('admin.slide_ads.add');
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
    		
            'Ten'=>'required|min:3|max:250|unique:advertising,Ten',
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
    	$slideads = new SlideAds();
    	

        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect('admin/slide-ads/add')->with('error','Bạn chỉ được chọn ảnh thôi ^^');
            }
            //lấy tên hình cũ
            $name= $file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("upload/slide_ads/".$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/slide_ads',$hinh);
            //trỏ đến tên
	    	$slideads->ten= $request->Ten;
	        $slideads->noidung= $request->NoiDung;
	        $slideads->link=$request->link;

            $slideads->hinh=$hinh;
			//lưu vào csdl
            $slideads->save();

    		// chuyển về trang add
    		return redirect('admin/slide-ads/add')->with('thongbao','Thêm thành công');
        }
        else{
            return redirect('admin/slide-ads/add')->with('error','Bạn chưa chọn ảnh ^^');
        }
    	
    }

    public function getEdit($id){
    	$slideads= SlideAds::find($id);
    	return view('admin.slide_ads.edit',['slideads'=>$slideads]);
    }

    public function postEdit(Request $request,$id)
    {
    	$slideads= SlideAds::find($id);
    	//tham số 1 là các lỗi, tham số 2 là các thông báo hiển thị ra màn hình
    	$this->validate($request,
    	[
    	//check biến có tên là Ten
    	//kiểm tra, yêu cầu nó phải được truyền vào và tối thiểu 2 kí tự
    	//kiểm tra trùng tên = unique
    		
            'Ten'=>'required|min:3|max:250|unique:advertising,Ten',
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
    	$slideads->ten= $request->Ten;
        $slideads->noidung= $request->NoiDung;
        $slideads->link=$request->link;

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect('admin/slide-ads/edit/'.$id)->with('error','Bạn chỉ được chọn ảnh thôi ^^');
            }
            //lấy tên hình cũ
            $name= $file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("upload/slide_ads/".$hinh))
            {
                $hinh=str_random(4)."_".$name;
            }
            $file->move('upload/slide_ads',$hinh);

            if($slideads->hinh!='')
            {
                if(file_exists("upload/slide_ads/".$slideads->hinh))
                {
                    unlink("upload/slide_ads/".$slideads->hinh);
                }
            }

            $slideads->hinh=$hinh;
        }
        $slideads->save();
    	// // chuyển về trang them
    	return redirect('admin/slide-ads/edit/'.$id)->with('thongbao','Edit SlideAds thành công');
    }
    public function getDelete($id){
        $slideads= SlideAds::find($id);
        if($slideads->hinh!='')
        {
        	if(file_exists('upload/slide_ads/'.$slideads->hinh))
        	{
        		unlink('upload/slide_ads/'.$slideads->hinh);
        	}
        }
        $slideads->delete();
        return redirect('admin/slide-ads/list')->with('thongbao','Xóa thành công');
    }
}
