<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class UserWorkshop extends MorphPivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Obtiene la unirodada más reciente, registrada por el
     * usuario.
     *
     * @param  array $workshops
     */
    public function unirodadaUser()
    {
        return $this->hasOne(UnirodadaUser::class, 'user_workshop_id');
    }
}