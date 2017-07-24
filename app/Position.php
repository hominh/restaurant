<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $timestamps = true;
    protected $table = 'positions';

    protected $fillable = ['name','user_id'];


    public function food()
    {
    	return $this->hasMany('App\Employee');
    }
}
