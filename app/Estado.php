<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey       =       'id_es';
    protected $table            =       'estados';
    public $timestamps          =       false;
}
