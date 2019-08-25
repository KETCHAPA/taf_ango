<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $employees = User::paginate(5);
        return view('Employees.listAll', compact("employees"));
    }

    public function create()
    {
        return view("Employees.add");
    }

    public function store(Request $request)
    {
        $user  = new User;
        $user->code = Str::random(10);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->email = $request->email;
        if($request->password != $request->password2){
            $arlert_type = "error";
            $message = "Les deux mots de passe ne coïncident pas !";

            $notification = array(
                "alert-type" => $arlert_type,
                "message" => $message
            );

            return back()->with($notification);
        }

        $user->password = bcrypt($request->password);
        $user->login = $request->login;
        $user->address = $request->address;
        $user->cni = $request->cni;
        if($request->age < 0){
            $arlert_type = "error";
            $message = "Age invalide";

            $notification = array(
                "alert-type" => $arlert_type,
                "message" => $message
            );

            return back()->with($notification);
        }
        
        $user->tel = $request->tel;
        $user->age = $request->age;

        if($user->save()) {
            $arlert_type = "success";
            $message = "Nouvel employé enregistré";
        } else {
            $arlert_type = "error";
            $message = "Echec lors de l'enregistrement";
        }

        $notification = array(
            "alert-type" => $arlert_type,
            "message" => $message
        );

        $employees = User::paginate(5);
        return redirect("/employees")->with($notification);
    }

    public function show($id)
    {
        $employee  = User::find($id);

        return view("Employees.show", compact("employee"));
    }

    public function edit($id)
    {
        $employee = User::find($id);

        return view("Employees.update", compact("employee"));
    }

    public function update(Request $request, $id)
    {
        $user  = User::find($id);
        if(isset($request->first_name)){
            $user->first_name = $request->first_name;
        }
        if(isset($request->last_name)){
            $user->last_name = $request->last_name;
        }
        if(isset($request->email)){
            $user->email = $request->email;
        }
        if(isset($request->role)){
            $user->role = $request->role;
        }
        if(isset($request->login)){
            $user->login = $request->login;
        }
        if(isset($request->address)){
            $user->address = $request->address;
        }
        if(isset($request->cni)){
            $user->cni = $request->cni;
        }
        if(isset($request->tel)){
            $user->tel = $request->tel;
        }
        if($request->password != $request->password2){
            $arlert_type = "error";
            $message = "Les deux mots de passe ne coïncident pas !";

            $notification = array(
                "alert-type" => $arlert_type,
                "message" => $message
            );

            return back()->with($notification);
        }

        $user->password = bcrypt($request->password);
        if(isset($request->age)){
            if($request->age < 0){
                $arlert_type = "error";
                $message = "Age invalide";
    
                $notification = array(
                    "alert-type" => $arlert_type,
                    "message" => $message
                );
    
                return back()->with($notification);
            }
            
            $user->age = $request->age;        
        }
        
        if($user->save()) {
            $arlert_type = "success";
            $message = "Nouvel employé enregistré";
        } else {
            $arlert_type = "error";
            $message = "Echec lors de l'enregistrement";
        }

        $notification = array(
            "alert-type" => $arlert_type,
            "message" => $message
        );

        $employees = User::paginate(5);
        return redirect("/employee/show/" . $user->id)->with($notification);
    }

    public function destroy($id)
    {
        if(User::find($id)->delete()) {
            $arlert_type = "success";
            $message = "Suppression effectuée";
        } else {
            $arlert_type = "error";
            $message = "Echec lors de la suppression";
        }

        $notification = array(
            "alert-type" => $arlert_type,
            "message" => $message
        );

        $employees = User::paginate(5);
        return back()->with($notification);
    }
}
