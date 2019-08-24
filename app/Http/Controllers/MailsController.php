<?php

namespace App\Http\Controllers;

use App\Mail;
use Exception;
use Illuminate\Http\Request;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::all();
        return view("Mails.index", compact("mails"));
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
            "sender" => "required|string",
            "receiver" => "required|string",
            "amount" => "required|string",
            "type" => "required|string|max:10"
        ]);

        $mail = new Mail();
        $mail->fill($request->all());
        try{
            $mail->save();
            return back()->withSuccess("Le courrier a bien été enregistré.");
        }catch(Exception $e){
            Log::error('=============================='.$e->getMessage().'===============================');
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez vérifier vos données et réessayez s'il vous plait."
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
        //
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
        //
    }

    public function send($id){
        $mail = Mail::findOrFail($id);

        if($mail->status == 1) return back()->withErrors([
            "message" => "L'élément a déjà été envoyé!"
        ]);

        $mail->status = 1;
        $mail->save();

        return back()->withSuccess("Le colis/Courrier a été expédié.");
    }

    public function receive($id){
        $mail = Mail::findOrFail($id);

        if($mail->status == 2) return back()->withErrors([
            "message" => "L'élément a déjà été reçu!"
        ]);

        $mail->status = 2;
        $mail->save();

        return back()->withSuccess("Le colis/Courrier a été marqué comme reçu.");
    }
}
