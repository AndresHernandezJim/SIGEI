<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lugar extends Model
{
    protected $table='lugar';
    protected $primarykey='id_lugar';
    protected $fillable=['id_lugar','id_localidad', 'direccion', 'latitud', 'longitud'];
     public $timestamps = false;
}
