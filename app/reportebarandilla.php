<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportebarandilla extends Model
{
     protected $table = 'reporte_barandilla';
    protected $primaryKey="id_reporte";
<<<<<<< HEAD
    protected $fillable = ['id_persona', 'causa', 'pertenencias','estatus','remite','observaciones', 'alias'];
=======
    protected $fillable = ['id_persona', 'causa', 'pertenencias','estatus','remite','observaciones','lugara_rresto','aseguramiento','destino'];
>>>>>>> 6aff75f6361c71aba017e3d4902c45a7690ea132
}
