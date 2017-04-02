<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';

    public function subcate(){
    	return $this->belongsTo('App\SubCategory','idSubCate','id');
    }
    public function commentProduct(){
    	return $this->hasMany('App\CommentProduct','idPro','id');
    }
    public function brand(){
    	return $this->belongsTo('App\Brand','idBrand','id');
    }
}
