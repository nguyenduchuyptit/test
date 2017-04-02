<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function commentBlog(){
        return $this->hasMany('App\CommentBlog','idUser','id');
    }
    public function commentProduct(){
        return $this->hasMany('App\CommentProduct','idUser','id');
    }
    public function Customer(){
        return $this->hasMany('App\Customer','idUser','id');
    }
}
