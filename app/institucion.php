<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    protected $table='institucion';
    protected $primarykey='id_institucion';
    protected $fillable=['id_lugar','nombre', 'domicilio','telefono','contacto'];
}
