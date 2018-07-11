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
     * Obtain the user information from Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(){
        $user = Socialite::driver('linkedin')->user();
        $usuario    =   User::where('facebook',$user->getId())->orWhere('email',$user->getEmail())->first();
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
            Notification::send($usuario, new RegistroNuevo($usuario));

        Auth::login($usuario,true);
        return redirect(route('home'));
    }
}
