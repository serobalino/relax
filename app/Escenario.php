<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    protected $primaryKey       =       'id_ec';
    protected $table            =       'escenarios';
    public $timestamps          =       false;

    public function estado(){
        return $this->belongsTo('App\Estado','id_es','id_es');
    }
}
