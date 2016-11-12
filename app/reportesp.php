<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportesp extends Model
{
    protected $table = 'reporte_sp';
    protected $primaryKey="id_reporte";
    protected $fillable = ['id_emergencia', 'tipoaviso', 'created_at','updated_at','hora','unidad','oficiales','observaciones'];
}
