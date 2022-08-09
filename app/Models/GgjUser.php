<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GGJUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ggj_users';

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
     */
    public $incrementing = true;

    /**
     * Indicates that timestamps are disabled
     *
     * @var bool
     */
    public $timestamps = false;

}
