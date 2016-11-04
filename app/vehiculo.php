<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $table = 'vehiculo';
    protected $primaryKey="id_vehiculo";
    protected $fillable = ['id_modelo', 'id_tipo', 'id_estado', 'serie', 'detalles','liberado','ubicacion','adeudo'];
    public $timestamps = false;
}
