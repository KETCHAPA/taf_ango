<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinister extends BaseModel
{
    public function ticket() {
        return $this->belongsTo("App\Ticket");
    }
}
