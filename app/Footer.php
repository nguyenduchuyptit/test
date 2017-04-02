<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table='foot_category';

    public function subFooter(){
    	return $this->hasMany('App\SubFooter','idFoot','id');
    }
}
