<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_vehiculo extends Model
{
    protected $table = 'tipo_vehiculo';
    protected $primaryKey="id_tipo";
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
