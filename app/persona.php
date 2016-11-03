<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $table='persona';
    protected $primarykey='id_persona';
    protected $fillable=['id_persona','id_lugar','id_ocupacion','padre_tutor','madre','apellido', 'alias','nombre','domicilio','curp','sexo','edad','telefono','tipo','activo_pd','activo_sp'];
     public $timestamps = false;
}
