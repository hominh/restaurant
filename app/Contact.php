<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true;
    protected $table = 'contact';

    protected $fillable = ['location1','location2','support_phone','address','user_id'];
}
