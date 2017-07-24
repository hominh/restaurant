<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $timestamps = true;
    protected $table = 'comments';

    protected $fillable = ['name','email','content'];
}
