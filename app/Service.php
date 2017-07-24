<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = true;
    protected $table = 'services';

    protected $fillable = ['name','alias','intro','content','image','keyword','description','user_id'];

}
