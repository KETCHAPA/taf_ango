<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::paginate(5);

        return view("Trips.allTrip", compact('trips'));
    }

    public function create()
    {
        return view('Trips.create');
    }

    public function store(Request $request)
    {
        $trip = new Trip();

        $trip->code = Str::random(10);
        $trip->destination = $request->destination;
        $trip->departure = $request->departure;
        $trip->date = $request->date;
        $trip->time = $request->time;
        $trip->amount = $request->amount;

        if($trip->save()){
            $message = "Voyage enregistré avec succès";
            $alert_type = "success";
        } else {
            $message = "Echec lors de l'enregistrement du voyage";
            $alert_type = "error";
        }

        $notification = array(
            "alert-type" => $alert_type,
            "message" => $message
        );

        return redirect("/trips")->with($notification);
    }

    public function show($id)
    {
        $trip = Trip::find($id);

        return view("Trips.show", compact("trip"));
    }

    public function edit($id)
    {
        $trip = Trip::find($id);

        return view('Trips.update', compact('trip'));
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::find($id);

        if(isset($request->destination)){
            $trip->destination = $request->destination;
        }
        if(isset($request->departure)){
            $trip->departure = $request->departure;
        }
        if(isset($request->date)){
            $trip->date = $request->date;
        }
        if(isset($request->time)){
            $trip->time = $request->time;
        }
        if(isset($request->amount)){
            $trip->amount = $request->amount;
        }

        if($trip->save()){
            $message = "Voyage mis à jour";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la mise à jour";
            $alert_type = "error";
        }

        $notification = array(
            "alert-type" => $alert_type,
            "message" => $message
        );

        return redirect("/trips")->with($notification);
    }

    public function destroy($id)
    {
        if(Trip::find($id)->delete()){
            $message = "Voyage supprimé";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la suppression";
            $alert_type = "error";
        }

        $notification = array(
            "alert-type" => $alert_type,
            "message" => $message
        );

        return redirect("/trips")->with($notification);
    }
}
