<?php

namespace App\Http\Controllers;

use App\Trip;
use App\TripPlanning;
use Illuminate\Http\Request;

class TripPlanningController extends Controller
{
    public function index(){
        $elements = TripPlanning::all();
        $trips = Trip::all();

        return view("Planning.index", compact("elements", "trips"));
    }

    public function store(Request $request){
        $this->validate($request, [
            "date" => "date|required",
            "time" => "required",
            "trip_id" => "required"
        ]);

        $plan = new TripPlanning();
        $plan->fill($request->all());

        try{

            $plan->save();
            return back()->withSuccess("L'élément a bien été enregistré");

        }catch(Exception $e){
            Log::error('==========================='.$e->getMessage().'============================');
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez vérifier vos données et réessayez s'il vous plait."
            ]);
        }
    }

    public function cancel($plan_id){
        $tripPlan = TripPlanning::findOrFail($plan_id);
        $tripPlan->cancelled = !$tripPlan->cancelled;
        $tripPlan->save();

        $message = $tripPlan->cancelled ? "déprogrammé" : "reprogrammé";

        return back()->withSuccess("Le voyage a été $message.");
    }
}
