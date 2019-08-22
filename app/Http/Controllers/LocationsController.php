<?php

namespace App\Http\Controllers;

use App\Location;
use App\Vehicle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LocationsController extends Controller
{
    public function cancel(Request $request, $id){
        $location = Location::findOrFail($id);
        $location->cancelled = !$location->cancelled;
        $location->save();

        $message = $location->cancelled ? "annulée" : "dé-annulée";

        return back()->withSuccess("La location a bien été $message.");
    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate($request, [
            "vehicle_id" => "required",
            "location_date" => "required|date",
            "duration" => "required",
            "amount" => "required"
        ]);

        //$location_date = Carbon::createFromTimeString($request->input("location_date"));

        $exists = Location::where("vehicle_id", $request->input("vehicle_id"))
                            ->where("location_date", $request->input("location_date"))
                            ->first() != null;

        /*if($location_date->lt(Carbon::now())) return back()->withErrors([
            "message" => "La date d'emprunt ne peut être une date ultérieure"
        ]);*/

        if($exists) return back()->withErrors([
            "message" => "Ce véhicule a déjà été réservé pour cette date."
        ]);

        $location = new Location();
        $location->fill($request->all());
        try{

            $location->save();
            return back()->withSuccess("La location a bien été enregistrée.");

        }catch(Exception $e){
            Log::error('====================='.$e->getMessage()."=======================");
        }
    }

    public function locationForm($vehicle_id){
        $vehicle = Vehicle::findOrFail($vehicle_id);

        return view("Vehicles.create_location", compact("vehicle"));
    }

    public function edit(Request $request, $id){
        $location = Location::findOrFail($id);
        return view("Vehicles.edit_location", compact("location"));
    }

    public function update(Request $request, $location_id){
        //dd($request->all());
        $this->validate($request, [
            "vehicle_id" => "required",
            "duration" => "required",
            "amount" => "required"
        ]);

        $exists = Location::where("vehicle_id", $request->input("vehicle_id"))
                            ->where("location_date", $request->input("location_date"))
                            ->first() != null;

        if($exists) return back()->withErrors([
            "message" => "Ce véhicule a déjà été réservé pour cette date."
        ]);

        $location = Location::findOrFail($location_id);
        $location->fill($request->all());

        try{

            $location->save();
            return back()->withSuccess("La location a bien été mise à jour.");

        }catch(Exception $e){
            Log::error('====================='.$e->getMessage()."=======================");
        }
    }
}
