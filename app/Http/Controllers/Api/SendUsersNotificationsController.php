<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Boleto;
use App\Models\Torneo;
use App\Models\User;
use App\Notifications\BuyTicketNotification;
use App\Notifications\SendUsersNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SendUsersNotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Boleto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function sendNotifications(Request $request)
    {
       $users = User::whereIn('id', $request->user_id)->get();      
       Notification::send($users, new SendUsersNotification($request->asunto, $request->mensaje));

        return response()->json($users, 201);
        //return response()->json(['message' => 'Boleto creado'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boleto = Boleto::findOrFail($id);
        return response()->json($boleto, 200);
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
        $boleto = Boleto::findOrFail($id);
        $boleto->update($request->all());
        return response()->json($boleto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boleto = Boleto::findOrFail($id);
        Boleto::destroy($id);
        return response()->json(["message" => "El boleto {$boleto->id} eliminado"], 200);
    }
}
