<?php

namespace App\Http\Controllers;

use App\Lugar;
use Illuminate\Http\Request;
use Unirest\Request as Consulta;

class LugaresController extends Controller
{
    //url para consultar lugares en google maps
    private $url   =   "https://maps.googleapis.com/maps/api/place/autocomplete/json";

    //url para recuperar un lugar con el id
    private $url2   =   "https://maps.googleapis.com/maps/api/place/details/json";

    public function googleMapsPlaces(Request $datos){
        //consulta sin SSL
        Consulta::verifyPeer(false);

        $response = Consulta::get($this->url,
            [
                "Accept" => "application/rest"
            ],[
                "input"     =>  $datos->q,
                "types"     =>  '(regions)',
                "key"       =>  env('GOOGLE_MAPS'),
                "language"  =>  'es'
            ]
        );
        $aux=[];
        if($response->body->status!=='ZERO_RESULTS'){
            foreach ($response->body->predictions as $item){
                    $a['id']    =   $item->place_id;
                    $a['name']  =   $item->structured_formatting->main_text;
                    $a['name2'] =   $item->structured_formatting->secondary_text;
                    $a['geo']   =   $item->terms;
                    $a['lvl']   =   $item->types;
                    $a['code']  =   false;
                    $aux[]      =   $a;
            }
        }
        return ($aux);
    }

    public function recuperar($codigo){
        //consulta a la api de google
        $response = Consulta::get($this->url2,
            [
                "Accept" => "application/rest"
            ],[
                "placeid"   =>  $codigo,
                "key"       =>  env('GOOGLE_MAPS'),
                "language"  =>  'es'
            ]
        );
        //consulta en la base si esta registrado el lugar sino lo guarda
        $buscado  = Lugar::find($codigo);
        if(!$buscado){
            $buscado                =   new Lugar();
            $buscado->codigo_lu     =   $codigo;
            $buscado->titulo_lu     =   $response->body->result->address_components[0]->long_name;
            $buscado->lat_lu        =   $response->body->result->geometry->location->lat;
            $buscado->lng_lu        =   $response->body->result->geometry->location->lng;
            $buscado->save();

        }
        return ($response->body->result);
    }
    public function parseRecuperar($codigo){
        //devuelve en formato rest el resultado de la consulta
        return ([$this->recuperar($codigo)]);
    }
}
