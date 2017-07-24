<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestamps = true;
    protected $table = 'configs';

    protected $fillable = ['name','value','user_id'];
}
