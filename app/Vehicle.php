<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        "color", "brand", "model", "fuel", "description", "places", "FCD", "registration"
    ];
}
