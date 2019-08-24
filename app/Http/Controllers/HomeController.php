<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mail;
use App\Trip;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    function dashboard() {
        $new_users = User::where("created_at", Carbon::now()->subDay())->count();
        $quota_users = User::all()->count() - $new_users;
        $sales = 0;
        $trips = Trip::all()->count();
        $bookings = Booking::all()->count();

        $mails = Mail::orderBy("created_at", "DESC")->take(5);

        return view("Home.Dashboard", compact("new_users", "sales", "bookings", "quota_users", "trips", "mails"));
    }
}
