<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodtype extends Model
{
    public $timestamps = true;
    protected $table = 'foodtypes';

    protected $fillable = ['name','alias','keyword','description','order','parent_id','user_id'];


    public function food()
    {
    	return $this->hasMany('App\Food');
    }
}
