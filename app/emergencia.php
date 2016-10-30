<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emergencia extends Model
{
    //
    protected $table = 'emergencia';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'tipo'];
    public $timestamps = false;
}
