<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reporte_vehiculo extends Model
{
    protected $table = 'reporte_vehiculo';
    protected $primaryKey="id_reporte";
    protected $fillable = ['id_reporte', 'id_vehiculo', 'id_conductor', 'probable_resp', 'detalles'];
    public $timestamps = false;
}
