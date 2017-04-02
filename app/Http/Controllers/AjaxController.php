<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class AjaxController extends Controller
{
    public function getImages($Images){
    	$img= $Images;
    	echo "<img src='".$img."'>";
    }
     // cart update
    function update(Request $request){
        if($request->ajax()){
        	foreach ($request->data as $item) 
        	{
		   		Cart::update($item['getId'],$item['qty']);
        	}
        	echo "ok";
        }
    }
}
