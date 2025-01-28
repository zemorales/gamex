<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PreventaBoleto;
use Illuminate\Http\Request;

class PreventaBoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $preventa = PreventaBoleto::create($request->all());
        return response()->json($preventa, 201);
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

    public function obtenerValorboleto($torneo_id)
    {
        $valorBoleto = PreventaBoleto::whereDate('fecha_inicio_prev', '<=', now())
            ->whereDate('fecha_final_prev', '>=', now())
            ->where('torneo_id', '=', $torneo_id)
            ->get();
        return response()->json($valorBoleto, 200);
    }
}
