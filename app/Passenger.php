<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function bagages(){
        return $this->hasMany(Bagage::class);
    }
}
