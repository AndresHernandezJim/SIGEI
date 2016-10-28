<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regbarand extends Model
{
    protected $table = 'reporte_barandilla';
    protected $primaryKey="id_detenido";
    protected $fillable = ['id_sesion', 'id_usuario', 'ip','created_at','updated_at'];
}
