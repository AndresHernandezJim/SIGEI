<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesion extends Model
{
	protected $table = 'sys_sesion';
    protected $primaryKey="id_sesion";
    protected $fillable = ['id_sesion', 'id_usuario', 'ip','created_at','updated_at'];
    
}
