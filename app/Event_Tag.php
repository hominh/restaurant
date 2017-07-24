<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Tag extends Model
{
    protected $table = 'event_tags';

    protected $fillable = ['event_id','tag_id'];
}
