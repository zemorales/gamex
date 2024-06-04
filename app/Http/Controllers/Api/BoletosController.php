<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Boleto;
use App\Models\Torneo;
use Illuminate\Http\Request;

class BoletosController extends Controller
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
    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $boleto = Boleto::create($request->all());
        
        $torneo = Torneo::findOrFail($request->torneo_id);
        $torneo->usuarios()->attach(auth()->user()->id, ['tipo_usuario' => $request->tipo_usuario]);

        return response()->json($boleto, 201);
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
