<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class UsuariosController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function historial(){
        $lista  = Historial::with('escenario')->with('estado')->where('id_us',Auth::user()->id)->get();

        $aux    =   [];

        foreach ($lista as $item){
            $a['scene']         =       $item->escenario['titulo_ec'];
            $a['state']         =       $item->estado['titulo_es'];
            $a['date']          =       $item->fecha_hi;
            $a['date_parse']    =       Date::createFromFormat('Y-m-d H:i:s',$item->fecha_hi)->diffForHumans();

            $aux[]=$a;
        }

        return $aux;
    }

    public function informacion(){
        return Auth::user();
    }


}
