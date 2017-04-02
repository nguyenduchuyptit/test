<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    protected $table='comment_product';

    public function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
    
    public function product(){
    	return $this->belongsTo('App\Product','idPro','id');
    }
}
