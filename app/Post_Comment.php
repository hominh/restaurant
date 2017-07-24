<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Comment extends Model
{
    protected $table = 'post_comments';

    protected $fillable = ['post_id','comment_id'];
}
