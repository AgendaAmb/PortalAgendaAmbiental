<?php

namespace App\Models\Auth;

use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Student extends User implements LdapAuthenticatable
{
    use AuthenticatesWithLdap, HasLdapUser;


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
