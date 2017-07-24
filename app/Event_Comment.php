<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Comment extends Model
{
    protected $table = 'event_comments';

    protected $fillable = ['event_id','comment_id'];
}
