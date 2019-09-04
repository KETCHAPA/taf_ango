<?php

namespace App\Http\Controllers;

use App\Bagage;
use App\Booking;
use App\Passenger;
use App\Ticket;
use App\Trip;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where("isConfirm", "=", "0")->paginate(5);
        return view("Bookings.listAll", compact("bookings"));
    }

    public function create()
    {
        $trips = Trip::all();
        return view("Bookings.add", compact("trips"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => "email|unique:passengers",
            "tel"   => "required|unique:passengers",
        ]);

        $booking = new Booking();

        $passenger = Passenger::where("email", $request->email)->first() ?? new Passenger();

        $passenger->first_name = $request->first_name;
        $passenger->last_name = $request->last_name;
        $passenger->email = $request->email;
        $passenger->cni = $request->cni;
        $passenger->tel = $request->tel;

        $booking->trip_id = $request->trip_id;

        DB::beginTransaction();

        try{
            $passenger->save();

            $booking->passenger_id = $passenger->id;
            $booking->save();

            if($request->poids){
                for($i = 0; $i < count($request->poids); $i++){
                    $bagage = new Bagage();
                    $bagage->passenger_id = $passenger->id;
                    $bagage->trip_id = $booking->trip_id;
                    $bagage->poids = $request->poids[$i];
                    $bagage->description = $request->description[$i];

                    $bagage->save();
                }
            }

            DB::commit();

            return back()->withSuccess("La réservation a bien été enregistrée.");

        }catch(Exception $e){
            DB::rollback();
            error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        $trip = $booking->trip;
        return view("Bookings.show", compact("booking", "trip"));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        $trips = Trip::all();
        return view("Bookings.update", compact("booking", "trips"));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (isset($request->first_name)) {
            $booking->first_name = $request->first_name;
        }
        if (isset($request->last_name)) {
            $booking->last_name = $request->last_name;
        }
        if (isset($request->email)) {
            $booking->email = $request->email;
        }
        if (isset($request->cni)) {
            $booking->cni = $request->cni;
        }
        if (isset($request->tel)) {
            $booking->tel = $request->tel;
        }

        $booking->trip_id = $request->trip_id;

        if ($booking->save()) {
            $message = "Réservation mise à jour";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la mise à jour de la réservation";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/bookings")->with($notification);
    }

    public function destroy($id)
    {
        if (Booking::find($id)->delete()) {
            $message = "Réservation supprimée";
            $alert_type = "success";
        } else {
            $message = "Echec lors de la suppression de la réservation";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/bookings")->with($notification);
    }

    public function confirm($id)
    {
        $booking = Booking::find($id);
        $booking->isConfirm = 1;

        $ticket = new Ticket();
        $ticket->first_name = $booking->first_name;
        $ticket->last_name = $booking->last_name;
        $ticket->email = $booking->email;
        $ticket->cni = $booking->cni;
        $ticket->tel = $booking->tel;
        $ticket->trip_id = $booking->trip_id;

        if (($booking->save()) && ($ticket->save())) {
            $message = "Réservation confirmée. Retrouvez-la dans le voyage " . $booking->trip_id;
            $alert_type = "success";
        } else {
            $booking->isConfirm = 0;
            $message = "Echec lors de la confirmation de la réservation";
            $alert_type = "error";
        }

        $notification = array(
            "message" => $message,
            "alert-type" => $alert_type
        );

        return redirect("/bookings")->with($notification);
    }
}
