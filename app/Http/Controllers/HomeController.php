<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view("Home.Dashboard");
    }

    public function search(Request $request){
        return null;
    }

}
