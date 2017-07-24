<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $fillable = ['name','alias','intro','content','image','keyword','description','user_id','cate_id'];

    public $timestamps = false;



    
    public function user()
    {
    	return $this->belongTo('App\User');//1 san pham thuoc 1 cate
    }
}
