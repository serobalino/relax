<?php

namespace App\Http\Controllers;

use App\Historial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function actualizar(Request $datos){
        $validacion = Validator::make($datos->all(), [
            'nombre'        =>  'required',
            'email'         =>  'required|email',
            'contrasena'    =>  'nullable|confirmed',
            'ciudad'        =>  'required',
        ]);
        if ($validacion->fails()) {
            $mensaje = "";
            foreach ($validacion->errors()->all() as $item)
                $mensaje .= "$item</br>";
            return (['val' => false, 'mensaje' => $mensaje, 'errores' => $validacion->errors()->all()]);
        }else{
            $usuario            =   Auth::user();
            $usuario->name      =   $datos->nombre;

            if($usuario->email!==$datos->email && User::where('email',$datos->email)->count()===0)
                $usuario->email     =   $datos->email;
            else
                return (['val' => false, 'mensaje' => 'El correo electrónico ya esta en uso']);

            if($datos->contrasena)
                $usuario->password  =   bcrypt($datos->contrasena);
            $usuario->lugar     =   app( 'App\Http\Controllers\LugaresController')->guardarPlaceId($datos->ciudad);
            $usuario->save();

            return (['val' => true, 'mensaje' => 'Se ha actualizado su informacion de perfil']);
        }
    }
}
