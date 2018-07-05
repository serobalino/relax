<?php

namespace App;

use App\Notifications\RecuperarCuenta;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with   = ['lugar'];

    public function sendPasswordResetNotification($token){
        $this->notify(new RecuperarCuenta($token));
    }

    public function lugar(){
        return $this->belongsTo('App\Lugar','lugar','codigo_lu');
    }
}
