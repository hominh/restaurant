<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Tag extends Model
{
    protected $table = 'food__tags';

    protected $fillable = ['food_id','tag_id'];
}
