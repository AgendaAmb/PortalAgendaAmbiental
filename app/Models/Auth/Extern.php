<?php

namespace App\Models\Auth;

use App\Notifications\ResetPassword;

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

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @return object
     */
    public static function all($columns = ['*'])
    {
        return User::where('type', Extern::class)->get();
    }
}
