<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ["vehicle_id", "duration", "location_date", "borrower_name", "amount"];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function getStatus(){
        $today = Carbon::now();

        $cancelled = $this->attributes['cancelled'];
        $duration = $this->attributes['duration'];

        /*$location_date = Carbon::createFromTimeString($this->attributes['location_date']);
        $end_date = $location_date->addDays($duration);

        if($cancelled) return "Annulé";
        if($today->greaterThanOrEqualTo($location_date) && $today->lessThanOrEqualTo($end_date)) return "En cours";
        if($today->gt($end_date)) return "Passée";
        if($today->lt($location_date)) return "En attente";*/
    }

    public function getColor(){
        $status = $this->getStatus();
        switch($status){
            case "Annulé": return "danger";
            case "En attente": return "default";
            case "Passée": return "warning";
            case "En cours": return "success";
            default: return "default";
        }
    }
}
