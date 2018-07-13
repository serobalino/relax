<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function prueba($parametro=null){

    }
    
}
