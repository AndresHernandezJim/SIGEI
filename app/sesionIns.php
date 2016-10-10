<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesionIns extends Model
{
    protected $table = 'sesioninstit';
    protected $primaryKey="id_sesion";
    protected $fillable = ['id_sesion', 'id_usuario', 'id_institucion','fecha','observaciones'];
    public $timestamps = false;
}
