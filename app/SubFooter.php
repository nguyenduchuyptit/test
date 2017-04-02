<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubFooter extends Model
{
    protected $table='sub_foot_category';

    public function footer(){
    	return $this->belongsTo('App\Footer','idFoot','id');
    }
}
