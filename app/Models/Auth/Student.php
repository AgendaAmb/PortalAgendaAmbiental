<?php

namespace App\Models\Auth;

use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Student extends User implements LdapAuthenticatable
{
    use AuthenticatesWithLdap, HasLdapUser;

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
        'email_verified_at'
    ];

    /**
     * Model guard.
     *
     * @var string
     */
    protected $guard_name = 'students';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
