<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\CustomOrder;
use DB;
class customerController extends Controller
{
    function listCustomer(){
    	$customer = Customer::paginate(15);
    	return view('admin.customer.list',['customer'=>$customer]);
    }
    
    function detailCustomer($id){
    	$ord= CustomOrder::where('idCustom',$id)->get();
    	return view('admin.customer.detail',['ord'=>$ord]);
    }

    function postdetailCustomer(Request $request,$id){
        if($request->giaohang==1)
        {
            $customer = Customer::find($id);
            $customer->status=1;
            $customer->save();
            return redirect('admin/customer/list')->with('success','Đã giao hàng thành công');
        }
        else{
            $customer = Customer::find($id);
            $customer->status=0;
            $customer->save();
            return redirect('admin/customer/list')->with('success','Đã hủy giao hàng');
        }

    }

    function deleteCustomer($id)
    {
    	$custom= Customer::find($id);
    	$order= CustomOrder::where('idCustom',$id)->get();
    	if(count($order)>0)
    	{
    		CustomOrder::where('idCustom',$id)->delete();
    		$custom->delete();
    		return redirect('admin/customer/list')->with('thongbao','Đã xóa thành công');
    	}
    	else{
    		$custom->delete();
    		return redirect('admin/customer/list')->with('thongbao','Đã xóa thành công');
    	}
    }

    function chuagiao(){
    	$customer = Customer::where('status',0)->paginate(15);
    	return view('admin.customer.list',['customer'=>$customer]);
    }

    function dagiao(){
    	$customer = Customer::where('status',1)->paginate(15);
    	return view('admin.customer.list',['customer'=>$customer]);
    }
}
