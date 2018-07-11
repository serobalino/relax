<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\RegistroNuevo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Socialite;

class GoogleController extends Controller{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(){
        $user       =   Socialite::driver('google')->user();
        $usuario    =   User::where('google',$user->getId())->orWhere('email',$user->getEmail())->first();
        $a          =   false;
        if(!$usuario){
            $usuario            =   new User();
            $a                  =   true;
        }

            $usuario->name      =   $user->getName();
            $usuario->google    =   $user->getId();
            $usuario->avatar    =   $user->getAvatar();
            $usuario->email     =   $user->getEmail();
            $usuario->save();
        if($a)
            Notification::send($usuario, new RegistroNuevo($usuario));

        Auth::login($usuario,true);
        return redirect(route('home'));
    }
}
