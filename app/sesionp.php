<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesionp extends Model
{
    protected $table = 'sesion';
    protected $primaryKey="id_sesion";
    protected $fillable = ['id_sesion', 'id_usuario', 'id_persona','id_institucion','fecha', 'detalle'];
    public $timestamps = false;
}
