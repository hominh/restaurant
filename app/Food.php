<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = true;
    protected $table = 'foods';

    protected $fillable = ['name','alias','price','intro','content','image','keyword','description','size','foodtype_id','user_id'];


    public function foodtype() {
        return $this->belongTo('App\Foodtype'); //n-1
    }

    public function user() {
        return $this->belongTo('App\User'); //n-1
    }
}
