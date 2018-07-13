<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    /**
     * recibe el parametro por URL si no hay parametro setea una variable de session acumulale si se acumula mas de 3 veces
     * manda la vista de que ha usado la version de prueba
    **/
    public function prueba($parametro=null){
        if(session('parametro') && $parametro>0)
            session(['parametro' => session('parametro')+1]);
        else
            session(['parametro' => 1]);
        $parametro  =   session('parametro');
        switch ($parametro) {
            case 1:
                return view('prueba.estados');
                break;
            case 2:
                return view('prueba.escenarios');
                break;
            case 3:
                return view('prueba.vr');
                break;
            default:
                return view('prueba.ya_nopuede');
                break;
        }
    }

}
