<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public $timestamps = true;
    protected $table = 'foots';

    protected $fillable = ['name','alias','order','keyword','description','content','foottype_id','user_id','image'];


    public function foottype() {
        return $this->belongTo('App\Foottype');
    }

    public function user() {
        return $this->belongTo('App\User');
    }

    

}

