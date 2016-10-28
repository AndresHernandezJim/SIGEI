<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    protected $table = 'reporte';
    protected $primaryKey="id_reporte";
    protected $fillable = ['id_emergencia', 'tipo_aviso', 'id_lugar','fecha','hora','canalizacion','detalles','id_sesion'];
    public $timestamps=false;

}
