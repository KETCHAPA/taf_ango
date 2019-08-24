<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ["employe_id", "report_type_id", "title", "description"];
}
