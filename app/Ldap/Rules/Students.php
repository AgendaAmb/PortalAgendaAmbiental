<?php

namespace App\Ldap\Rules;

use App\Models\Auth\Student;
use App\Models\Auth\User;
use LdapRecord\Laravel\Auth\Rule;

class StudentsRule extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        $user = User::whereIn('email', $this->user->mail)
            ->where('type', Student::class)
            ->has('roles')
            ->first();

        return $user !== null;
    }
}
