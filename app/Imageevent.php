<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageevent extends Model
{
    public $timestamps = true;
    protected $table = 'imageevent';

    protected $fillable = ['image','event_id','user_id'];

}
