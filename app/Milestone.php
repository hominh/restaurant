<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    public $timestamps = true;
    protected $table = 'milestones';

    protected $fillable = ['name','content','author','user_id'];
}
