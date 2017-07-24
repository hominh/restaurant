<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foottype extends Model
{
	public $timestamps = true;
    protected $table = 'foottypes';

    protected $fillable = ['name','alias','order','parent_id','keyword','description','content','user_id'];


    public function post()
    {
    	return $this->hasMany('App\Post'); //1 cate nhieu post
    }

}
