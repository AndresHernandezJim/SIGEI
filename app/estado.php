<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    protected $table='estado';
    protected $primarykey='id_estado';
    protected $fillable=['id_estado','id_pais','nombre'];
}
