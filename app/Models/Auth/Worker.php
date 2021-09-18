<?php

namespace App\Models\Auth;

use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Worker extends User
{
    use AuthenticatesWithLdap, HasLdapUser;

    /**
     * Model guard.
     *
     * @var string
     */
    protected $guard_name = 'workers';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @return object
     */
    public static function all($columns = ['*'])
    {
        return User::where('type', Worker::class)->get();
    }
}
