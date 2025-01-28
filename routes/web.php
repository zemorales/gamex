<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mail', function () {
    $user = App\Models\User::find(1);
    $torneo = App\Models\Torneo::find(5);
    $boleto = App\Models\Boleto::find(7);
    $mensaje = "Gracias por participar en el torneo de $torneo->nombre_torneo"; //prueba para ver la plantilla
    $ocultar = "vacio";
    return view('content.mails.event_management', compact('user', 'boleto', 'mensaje','ocultar'));
});
