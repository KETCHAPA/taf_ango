<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends BaseModel
{
    public function trip() {
        return $this->belongsTo("App\Trip");
    }
}
