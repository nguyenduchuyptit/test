<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    protected $table='custom_order';
    public function customer()
    {
    	return $this->belongsTo('App\Customer','idCustom','id');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product','idPro','id');
    }
}
