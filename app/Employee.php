<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = true;
    protected $table = 'employees';

    protected $fillable = ['firstname','lastname','title','titleofcourtesy','birthdate','hiredate','address','city','region','postalcode','country','homephone','extension','photo','note','facebook_url','twitter_url','tumblr_url','position_id','user_id'];
}
