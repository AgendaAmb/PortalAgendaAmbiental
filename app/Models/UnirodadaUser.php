<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnirodadaUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the parent imageable model (extern, workers or students).
     */
    public function user()
    {
        return $this->morphTo();
    }
}
