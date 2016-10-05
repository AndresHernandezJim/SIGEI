<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ocupacion extends Model
{
    protected $table='ocupacion';
    protected $primarykey='id_ocupacion';
    protected $fillable=['id_ocupacion','nombre'];
    public $timestamps = false;
}
