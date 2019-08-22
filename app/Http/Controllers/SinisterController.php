<?php

namespace App\Http\Controllers;

use App\Sinister;
use App\Ticket;
use Illuminate\Http\Request;

class SinisterController extends Controller
{
    public function index() {
        $sinisters = Sinister::paginate(5);
        return view("Sinisters.listAll", compact("sinisters"));
    }

    public function show($id) {
        $sinister = Sinister::find($id);
        $ticket = $sinister->ticket;
        return view("Sinisters.show", compact('sinister', 'ticket'));
    }

    public function create() {
        $customers = Ticket::all();
        return view("Sinisters.add", compact("customers"));
    }

    public function store(Request $request) {
        $sinister = new Sinister();
        $sinister->label = $request->label;
        $sinister->ticket_id = $request->ticket_id;
        if($sinister->save()){
            $message = "Incident Ajouté";
            $alert_type = "success";
        } else {
            $message = "Echec lors de l'ajout de l'incident";
            $alert_type = "error";
        }
        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/sinisters")->with($notification);
    }

    public function close($id) {
        $sinister = Sinister::find($id);
        $sinister->isClose = 1;
        if($sinister->save()){
            $message = "Incident clos";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la fermeture de l'incident";
            $alert_type = "error";
        }
        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/sinisters")->with($notification);
    }
    public function destroy($id) {
        if(Sinister::find($id)->delete()){
            $message = "Incident supprimé";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la suppression de l'incident";
            $alert_type = "error";
        }
        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/sinisters")->with($notification);
    }
}
