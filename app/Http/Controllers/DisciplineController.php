<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = User::where("role", "personnel")->paginate(10);
        return view("Discipline.index", compact("personnels"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "cni" => "required",
            "email" => "email|required",
            "first_name" => "string",
            "last_name" => "string",
            "phone" => "required",
            "address" => "string"
        ]);

        $password = \str_random(8);
        $user = new User();
        $user->fill($request->all());
        //$user->code = "PER".
        $user->tel = $request->input("phone");
        $user->password = $password;
        $user->role = "personnel";
        try {
            DB::beginTransaction();
            $user->save();

            Mail::raw("Bonjour monsieur " . $user->first_name . ", le nouveau mot de passe pour votre compte sur " . env("APP_NAME") . " est $password", function ($message) use ($user) {
                $message->from('noreply@' . env("APP_NAME") . ".com", env('APP_NAME'));
                $message->sender('noreply@' . env("APP_NAME") . ".com", env('APP_NAME'));
                $message->to($user->email, $user->first_name . " " . $user->last_name);
                $message->subject('Mot de passe');
            });

            DB::commit();

            return back()->withSuccess("Le nouveau personnel a bien été enregistré.");
        } catch (Exception $e) {
            DB::rollback();
            Log::error('================================='.$e->getMessage().'=================================');
            return back()->withErrors([
                "Une erreur est survenue, veuillez vérifier les données de votre formulaire et réessayer s'il vous plait."
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = User::with("presences")->findOrFail($id);
        return response()->json($personnel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnel = User::findOrFail($id);
        $personnel->delete();
        return back()->withSuccess("Le personnel a bien été retiré.");
    }
}
