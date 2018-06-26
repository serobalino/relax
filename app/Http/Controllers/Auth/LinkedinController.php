<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        dd($user);
    }
}
