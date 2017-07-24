<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $table = 'posts';

    protected $fillable = ['name','alias','intro','content','image','keyword','description','posttype_id','user_id'];

    public function tags() {
        return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }

}
