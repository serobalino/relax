<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Date\Date;

class HistorialController extends Controller
{
    /**
     * esta clase solo funciona si el usuario esta autenticado
     *
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * valida que llegue dos campos @scene y @state que deben ser los IDs de escenarios y estados que elegio el usuario
     * y deben pertenecer a un ID valido registrado previamente
     * posteriormete crea un nuevo registro en la tabla @Historial
     * y busca en el disco el video que tenga la ID de ecena seleccionada
     * devuelve la URL para que puede vizualizar si no existe devuelve el video de ID = aleatorio entre 1 y 11
    **/
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
            $historia->id_es    =   $datos->state;
            $historia->id_ec    =   $datos->scene;
            $historia->id_us    =   Auth::user()->id;
            $historia->save();
            $dir    =   Storage::disk('public')->url($datos->scene.'.mp4');
            if(!$dir){
                $escena =   rand (1,11);
                $dir    =   Storage::disk('public')->url("$escena.mp4");
            }
            return (['val' => true, 'mensaje' => 'Se cargo completamente', 'url' => $dir ]);
        }
    }

    /**
     * lista el @Historial de un usuario logiado
     * con la relacion escenarios
     * y estado
     *
     * depues la informacion es parceada para que la fecha salga en formato de tiempo pasado y no en fecha simple
     *
     * regresa el array invertido para que aparezca el registro ultimo primero
     *
    **/
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

        return array_reverse($aux);
    }
}
