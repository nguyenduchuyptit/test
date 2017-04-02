<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    protected $table ='comment_blog';

    public function blog(){
    	return $this->belongsTo('App\Blog','idBlog','id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
}
