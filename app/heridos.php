<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class heridos extends Model
{
    protected $table='herido';
    protected $primarykey='id_reporte';
    protected $fillable=['id_reporte','id_persona'];
    public $timestamps = false;
}
