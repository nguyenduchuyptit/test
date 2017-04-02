<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';

    public function subCategory(){
    	return $this->hasMany('App\SubCategory','idCate','id');
    }
    public function product(){
    	return $this->hasManyThrough('App\Product','App\SubCategory','idCate','idSubcate');
    }
}
