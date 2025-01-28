<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesComisionesController extends Controller
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
        //
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

    public function totalComisionesTorneos()
    {
        $torneos = DB::table('torneos')
            ->join('boletos', 'torneos.id', '=', 'boletos.torneo_id')
            ->join('comision_boleto', 'boletos.id', '=', 'comision_boleto.boleto_id')
            ->select('torneos.id', 'torneos.nombre_torneo', DB::raw('SUM(comision_boleto.valor_comision) as total_comisiones'))
            ->groupBy('torneos.id', 'torneos.nombre_torneo')
            ->orderBy('torneos.nombre_torneo', 'asc')
            ->get();

        return response()->json($torneos, 200);
    }
}
