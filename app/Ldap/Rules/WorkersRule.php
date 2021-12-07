<?php

namespace App\Ldap\Rules;

use App\Models\Auth\User;
use App\Models\Auth\Worker;
use LdapRecord\Laravel\Auth\Rule;

class WorkersRule extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        $user = User::whereIn('email', $this->user->mail)
            ->where('type', Worker::class)
            ->has('roles')
            ->first();

        return $user !== null;
    }
}
