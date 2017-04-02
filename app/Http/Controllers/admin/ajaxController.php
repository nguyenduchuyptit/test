<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use DB;
class ajaxController extends Controller
{
    public function getSubcate($idCate){
    	$subcate= SubCategory::where('idCate',$idCate)->get();
    	foreach ($subcate as $sub) {
    		echo "<option value='".$sub->id."'>".$sub->ten."</option>";
    	}
    }
}
