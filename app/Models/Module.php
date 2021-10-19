<?php

namespace App\Models;

use App\Models\Auth\User;
use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo de representación que permite representar un módulo de una aplicación. 
 * Usa las tablas que maneja por defecto "Laravel Passport". Por ejemplo:
 * 
 * Módulo de control escolar: https://ambiental.uaslp.mx/controlescolar
 * Módulo de biodiversidad: https://ambiental.uaslp.mx/biodiversidad
 */
class Module extends Model
{  
    use SoftDeletes;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    /**
     * Gets the list of all users of this module
     *
     * @return object
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
