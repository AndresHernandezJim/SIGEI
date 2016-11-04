<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelo_vehiculo extends Model
{
    protected $table = 'modelo_vehiculo';
    protected $primaryKey="id_modelo";
    protected $fillable = ['id_marca',  'nombre', 'anio'];
    public $timestamps = false;
}
