<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Booking;
use App\Location;
use App\Mail;
use App\Presence;
use App\Trip; 
use App\TripPlanning;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login() {
        return view("Home.login");
    }

    public function doLogin(Request $request) {

        $credentials = $request->only(["email", "password"]);
        if(Auth::attempt($credentials)){
            return redirect()->route("dashboard");
        }else{
            return back()->withErrors([
                "message" => "Adresse mail ou mot de passe incorrect"
            ]);
        }

    }

    public function dashboard() {
        $new_users = User::where("created_at", Carbon::now()->subDay())->count();
        $sales = 0;
        $trips = Trip::all()->count();
        $bookings = Booking::all()->count();

        $tickets = Ticket::all();
        $trip_amount = 0;

        foreach($tickets as $ticket){
            $trip = Trip::find($ticket->trip_id);
            if($trip->date == Carbon::now()->subDay()){
                $sales += $trip->amount;   
            }
        }

        $elements = TripPlanning::all();
        return view("Home.Dashboard", compact("new_users", "sales", "bookings", "quota_users", "trips", "mails", "elements"));
    }

    public function search(Request $request){
        return null;
    }

    public function logout(){
        return redirect("/");
    }

    public function stats() {
        $new_users = User::where("created_at", Carbon::now()->subDay())->count();
        $quota_users = User::all()->count() - $new_users;
        $all_users = User::all()->count();
        $tickets = Ticket::all();
        $trip_amount = 0;
        $mails = Mail::all();
        $mail_amount = 0;
        $bills = Bill::all();
        $bill_amount = 0;
        $locations = Location::all();
        $location_amount = 0;

        foreach($mails as $mail){
            $mail_amount += $mail->amount; 
        }

        foreach($tickets as $ticket){
            $trip = Trip::find($ticket->trip_id);
            $trip_amount += $trip->amount;
        }

        foreach($bills as $bill){
            $bill_amount += $bill->amount;
        }

        foreach($locations as $location){
            $location_amount += $location->amount; 
        }

        //Employé du mois
        $presences = Presence::all();
        $tab = array();
        foreach($presences as $presence){
            if(!in_array($presence->user_id, $tab)){
                array_push($tab, $presence->user_id);
            }
        }
        $max = Presence::where("user_id", $tab[0])->count();
        $id_user = $tab[0];
        
        foreach($tab as $user_id){
            if(Presence::where("user_id", $user_id)->count() > $max){
                $max = Presence::where("user_id", $user_id)->count();
                $id_user = $user_id;
            }
        }

        $employee = User::find($id_user);

        $best_employee = $employee->first_name . " " . $employee->last_name;
        
        $presences = Presence::all()->take(7);

        $duree= strtotime($presences->last()->presence_date) - strtotime($presences->first()->presence_date);

        if($duree > 7){
            $work_load = $duree % 7; 
        } else {
            $work_load = $duree;
        }

        $absence_rate = "";
        

        $trips = Trip::all()->count();
        $bookings = Booking::all()->count();

        $elements = TripPlanning::all();
        return view("Home.stats", compact("new_users", "work_load", "best_employee","mails", "bills", "trip_amount", "bookings", "quota_users", "trips", "tickets", "mail_amount", "bill_amount", "all_users"));
    }
}
