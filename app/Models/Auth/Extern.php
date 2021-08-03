<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Extern extends User
{
    /**
     * Model guard.
     *
     * @var string
     */
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token', 
        'guid', 
        'domain', 
        'created_at', 
        'updated_at',
        'email_verified_at',
        'access_token'
    ];
}
