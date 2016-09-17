<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilegios extends Model
{
     protected $table='privilegio';
    protected $primarykey='idprivilegio';
    protected $fillable=['nombre'];
}
