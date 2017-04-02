<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class indexController extends Controller
{
    public function index(){
    	if(Auth::User())
    	{
    		return view('admin.layouts.content-index');
    	}
    	else{
    		return redirect('admin/login');
    	}
    }
}
