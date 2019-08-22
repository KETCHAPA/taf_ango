<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends BaseModel
{
    public function trip() {
        return $this->belongsTo("App\Trip");
    }
}
