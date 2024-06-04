<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Torneo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $torneo = Torneo::create($request->all());
        $torneo->usuarios()->attach(auth()->user()->id, ['tipo_usuario' => 'admin']);
        return response()->json($torneo, 201);
    }

    public function contarUsuarios(Request $request, $tipo_usuario, $torneo_id)
    {
        $torneo = Torneo::findOrFail($torneo_id);
        $usuarios = $torneo->usuarios()->wherePivot('tipo_usuario', $tipo_usuario)->get();
        return response()->json(['count' => $usuarios->count()], 200);
    }  
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::with(["juego","categoria","boleto","usuarios"])->findOrFail($id);
        return response()->json($torneo, 200);
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
        $torneo = Torneo::findOrFail($id);
        $torneo->update($request->all());
        return response()->json($torneo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Torneo::findOrFail($id)->delete();
        return response()->json(['message' => 'Torneo eliminado'], 200);
    }
}
