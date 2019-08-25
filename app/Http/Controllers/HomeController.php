<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mail;
use App\Trip;
use App\User;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function login() {
        return view("Home.login");
    }

    public function profile(Request $request) {
        $user = User::where("login", "like", $request->login);

        dd($user);

        /* if($user->password == bcrypt($request->password)){
            return redirect("/dashbaord");
        } else {
            $notification = array(
                "message" => "Login ou Mot de passe incorrect",
                "alert-type" => "error"
            );

            return back()->with($notification);
        } */

    }

    public function dashboard() {
        $new_users = User::where("created_at", Carbon::now()->subDay())->count();
        $quota_users = User::all()->count() - $new_users;
        $sales = 0;
        $trips = Trip::all()->count();
        $bookings = Booking::all()->count();

        $mails = Mail::orderBy("created_at", "DESC")->take(5);

        return view("Home.Dashboard", compact("new_users", "sales", "bookings", "quota_users", "trips", "mails"));
    }

    public function search(Request $request){
        return null;
    }

}
