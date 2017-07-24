<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttype extends Model
{
    public $timestamps = true;
    protected $table = 'posttypes';

    protected $fillable = ['name','alias','keyword','description','order','user_id'];


    public function post()
    {
    	return $this->hasMany('App\Post');
    }


    /*protected static $rules = [
        'name' => 'required|alpha|unique:roles',
        'displayName' => 'required|alpha_dash',
        'permissions' => 'array',
    ];*/
}
