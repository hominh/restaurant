<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public $timestamps = true;
    protected $table = 'histories';

    protected $fillable = ['year','content','image','user_id'];

}
