<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customer';
    public function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
    public function customorder(){
    	return $this->hasMany('App\CustomOrder','idCustom','id');
    }
}
