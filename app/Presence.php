<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = ["user_id", "presence_date", "presence_time"];
}
