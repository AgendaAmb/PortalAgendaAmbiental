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
}
