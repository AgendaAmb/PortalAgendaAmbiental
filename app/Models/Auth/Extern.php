<?php

namespace App\Models\Auth;

use App\Notifications\ResetPassword;
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
        'email_verified_at',
        'access_token'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
