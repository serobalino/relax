<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardar(Request $datos){
        $validacion = Validator::make($datos->all(), [
            'scene'        =>  'required|exists:escenarios,id_ec',
            'state'        =>  'required|exists:estados,id_es',
        ]);
        if ($validacion->fails()) {
            $mensaje = "";
            foreach ($validacion->errors()->all() as $item)
                $mensaje .= "$item</br>";
            return (['val' => false, 'mensaje' => $mensaje, 'errores' => $validacion->errors()->all()]);
        }else{
            $historia           =   new Historial();
            $historia->id_es    =   $datos->scene;
            $historia->id_ec    =   $datos->state;
            $historia->id_us    =   Auth::user()->id;
            $historia->save();
            $dir    =   Storage::disk('public')->url($datos->scene.'.mp4');
            if(!$dir){
                $dir    =   Storage::disk('public')->url('1.mp4');
            }
            return (['val' => true, 'mensaje' => 'Se cargo completamente', 'url' => $dir ]);
        }
    }
}
