<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table        =   'historial';
    public const UPDATED_AT =   'fecha_hi';
    public const CREATED_AT =   'fecha_hi';

    protected $hidden   =   ['id_ec','id_es','id_us'];

    public function estado(){
        return $this->belongsTo('App\Estado','id_es','id_es');
    }

    public function escenario(){
        return $this->belongsTo('App\Escenario','id_ec','id_ec');
    }
}
