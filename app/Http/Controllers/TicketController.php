<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Trip;
use Barryvdh\DomPDF\PDF;

class TicketController extends Controller
{
    public function index($id) {
        $trip = Trip::find($id);
        $tickets = $trip->tickets;

        return view('Tickets.listAll', compact('tickets', 'trip'));
    }

    public function show($id) {
        $ticket = Ticket::find($id);
        $trip = $ticket->trip;

        return view("Tickets.show", compact('ticket', 'trip'));
    }

    public function create($id) {
        $trip = Trip::find($id);
        return view('Tickets.create', compact("trip"));
    }

    public function store($id, Request $request) {
        $ticket = new Ticket();

        $ticket->first_name = $request->first_name;
        $ticket->last_name = $request->last_name;
        $ticket->tel = $request->tel;
        $ticket->cni = $request->cni;
        $ticket->email = $request->email; 
        $ticket->trip_id = $id;
        if($ticket->save()){
            $message = "ticket ajoutée";
            $alert_type = "success";
        } else {
            $message = "Echec lors de l'enregistrement du passager";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/tickets/" . $id)->with($notification);
    }

    public function edit($id) {
        $ticket = Ticket::find($id);
        $trip = $ticket->trip;
        return view("Tickets.update", compact("ticket", "trip"));
    }

    public function update($id, Request $request) {
        $ticket = Ticket::find($id);
        $trip = $ticket->trip;

        if(isset($request->first_name)){
            $ticket->first_name = $request->first_name;
        }
        if(isset($request->last_name)){
            $ticket->last_name = $request->last_name;
        }
        if(isset($request->email)){
            $ticket->email = $request->email;
        }
        if(isset($request->cni)){
            $ticket->cni = $request->cni;
        }
        if(isset($request->tel)){
            $ticket->tel = $request->tel;
        }
        if($ticket->save()){
            $message = "ticket mis a jour";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la mise a jour du ticket";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/tickets/" . $trip->id)->with($notification);
    }

    public function validation($id) {
        $ticket = Ticket::find($id);
        $ticket->isValidate = 1;
        if($ticket->save()){
            $message = "ticket validé";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la validation du ticket";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return back()->with($notification);
    }

    public function destroy($id){
        $ticket = Ticket::find($id);
        $trip = $ticket->trip;

        if($ticket->delete()){
            $message = "Ticket supprimé";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la suppression du ticket";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/tickets/{{$trip->id}}")->with($notification);
    }

    public function printAllTickets($id) {
        $trip = Trip::find($id);
        $tickets = $trip->tickets->where("isValidate", "=", "1");

        $pdf = \PDF::loadView('pdf.allTicket', compact("tickets", "trip"));
        
        return $pdf->download('passagers voyage ' . $trip->departure . ' - ' . $trip->destination . '.pdf');
    }

    public function printTicket($id) {
        $ticket = Ticket::find($id);
        $trip = $ticket->trip;

        $pdf = \PDF::loadView('pdf.ticket', compact("ticket", "trip"));

        return $pdf->download('Ticket de bus.pdf');
    }
}
