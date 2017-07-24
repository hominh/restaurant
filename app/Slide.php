<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $timestamps = true;
    protected $table = 'slides';

    protected $fillable = ['title','description','textlink','link','image','user_id'];

}
