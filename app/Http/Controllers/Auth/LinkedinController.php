<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\RegistroNuevo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Laravel\Socialite\Facades\Socialite;

class LinkedinController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * @Socialite usa el driver de linkedin
     * el cual devuelve la informacion del usuario
     * verifica que la ID del usuario exista si existe solo actualiza la informacion si no existe crea un nuevo registro
     * y envia un email de bienvenida
     * y logea al usuario
     * al final retorna una redireccion a la pagina principal
    **/
    public function handleProviderCallback(){
        $user       =   Socialite::driver('linkedin')->user();
        $usuario    =   User::where('facebook',$user->getId())->orWhere('email',$user->getEmail())->first();
        $a          =   false;
        if(!$usuario){
            $usuario            =   new User();
            $a                  =   true;
        }


        $usuario->name      =   $user->getName();
        $usuario->facebook  =   $user->getId();
        $usuario->avatar    =   $user->getAvatar();
        $usuario->email     =   $user->getEmail();
        $usuario->save();

        if($a)
            Notification::send($usuario, new RegistroNuevo());

        Auth::login($usuario,true);
        return redirect(route('home'));
    }
}
