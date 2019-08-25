<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends BaseModel
{
    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}
