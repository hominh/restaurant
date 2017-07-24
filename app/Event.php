<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = true;
    protected $table = 'events';

    protected $fillable = ['name','intro','content','datetime','avatar','alias','website','user_id'];


    public function imageevent()
    {
    	return $this->hasMany('App\Imageevent');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag','event_tags','event_id','tag_id');
    }
}
