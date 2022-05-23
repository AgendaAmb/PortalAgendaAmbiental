<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnirutaUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_workshop_id';


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * Obtiene el taller al que corresponde la unirodada.
     *
     * @return object
     */
    public function userWorkshop(): BelongsTo
    {
        return $this->belongsTo(UserWorkshop::class);
    }
}
