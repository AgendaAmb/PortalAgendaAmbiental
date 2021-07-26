<?php

namespace App;

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
    /**
     * Gets the list of users of this module
     *
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
