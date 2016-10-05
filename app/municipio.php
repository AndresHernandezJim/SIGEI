<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $table='municipio';
    protected $primarykey='id_municipio';
    protected $fillable=['id_municipio','id_estado','nombre'];
}
