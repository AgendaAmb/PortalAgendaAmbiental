<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de representación que permite representar un módulo de una aplicación. 
 * Usa las tablas que maneja por defecto "Laravel Passport". Por ejemplo:
 * 
 * Módulo de control escolar: https://ambiental.uaslp.mx/controlescolar
 * Módulo de biodiversidad: https://ambiental.uaslp.mx/biodiversidad
 */
class Module extends Model
{  
    use UserTrait;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

}
