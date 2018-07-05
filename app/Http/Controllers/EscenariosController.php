<?php

namespace App\Http\Controllers;

use App\Escenario;
use Illuminate\Http\Request;

class EscenariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Escenario::select('id_ec AS id','id_es AS state','titulo_ec AS title','imegen_ec AS picture','tiempo_ec AS time')->get();
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
        $nuevo              =   new Escenario();
        $nuevo->id_es       =   $request->state;
        $nuevo->titulo_ec   =   $request->title;
        $nuevo->imege_ec    =   $request->picture;
        $nuevo->tiempo_ec   =   $request->time;
        $nuevo->save();
        return ([true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta   =   Escenario::select('id_ec AS id','id_es AS state','titulo_ec AS title','imegen_ec AS picture','tiempo_ec AS time')
                                ->where('id_es',$id)
                                ->get();
        return $consulta;
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
        $editar             =   Escenario::find($id);
        $editar->id_es      =   $request->state;
        $editar->titulo_ec  =   $request->title;
        $editar->imege_ec   =   $request->picture;
        $editar->tiempo_ec  =   $request->time;
        $editar->save();
        return ([true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar           =   Escenario::find($id);
        $eliminar->delete();
        return ([true]);
    }
}
