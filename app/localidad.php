<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class localidad extends Model
{
    protected $table='localidad';
    protected $primarykey='id_localidad';
    protected $fillable=['id_municipio','nombre'];
    public $timestamps=false;
}
