<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public $timestamps = true;
    protected $table = 'tags';

    protected $fillable = ['name','alias'];

	public function posts() {
		 return $this->belongsToMany('App\Post');
	}
}
