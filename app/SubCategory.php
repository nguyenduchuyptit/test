<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='sub_category';
    public function category(){
    	return $this->belongsTo('App\Category','idCate','id');
    }
    public function product(){
    	return $this->hasMany('App\Product','idSubCate','id');
    }
}
