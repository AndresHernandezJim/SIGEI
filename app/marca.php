<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    protected $table = 'marca_vehiculo';
    protected $primaryKey="id_marca";
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
