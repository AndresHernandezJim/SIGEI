<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportebarandilla extends Model
{
     protected $table = 'reporte_barandilla';
    protected $primaryKey="id_reporte";
    protected $fillable = ['id_persona', 'causa', 'pertenencias','estatus','remite','observaciones'];
}
