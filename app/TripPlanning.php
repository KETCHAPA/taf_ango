<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TripPlanning extends Model
{
    protected $fillable = ["date", "time", "trip_id"];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function getState(){
        $date = $this->attributes["date"];
        $time = $this->attributes["time"];

        $trip_date = Carbon::createFromTimeString("$date $time");
        $today = Carbon::now();

        if($this->attributes['cancelled'] == 1) return "Déprogrammé";
        if($today->lt($trip_date)) return "A venir";
        if($today->gt($trip_date)) return "Passé";
        if($today->eq($trip_date)) return "En cours";
    }

    public function getColor(){
        $state = $this->getState();
        switch($state){
            case "A venir": return "success";
            case "Passé": return "danger";
            case "En cours": return "primary";
            case "Déprogrammé": return "danger";
            default: return "default";
        }
    }
}
