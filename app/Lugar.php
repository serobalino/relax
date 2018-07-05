<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table        =       'lugares';
    protected $primaryKey   =       'codigo_lu';
    public $incrementing    =       false;
    public $timestamps      =       false;

    protected $casts        =   [
        'lat_lu'    =>  'double',
        'lng_lu'    =>  'double'
    ];
}
