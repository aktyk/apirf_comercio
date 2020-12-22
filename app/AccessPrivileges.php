<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessPrivileges extends Model
{
    const STATUS_ACTIVE = 'ACTIVO';
    const STATUS_INACTIVE = 'INACTIVO';

    //
    protected $table = 'permiso';
    public $timestamps = false;
    
    protected $fillable = [
    	'IdProceso',
    	'IdEmpleado',
    	'Estado',
    ];
}
