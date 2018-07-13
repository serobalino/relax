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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile');
    }


    public function informacion(){
        return Auth::user();
    }

    /**
     * valida que los campos minimos para actualizar la informacion de un usuario llegue
     * valida que el email si no es del mismo usuario no exista previamente en la base de datos
     * y llama a la funcion para guardar un lugar de el controlador de lugares
    **/
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

            if($usuario->email!==$datos->email)
                if( User::where('email',$datos->email)->count()===0)
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
