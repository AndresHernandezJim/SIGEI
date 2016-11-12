<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repsp_per extends Model
{
    protected $table = 'detalle_per_rep';
    protected $primaryKey="id_reporte";
    protected $fillable = ['id_reporte','id_persona','estatus'];
}
