<?php

namespace App\Models\Auth;

use App\Traits\ModuleTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable // implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles, ModuleTrait;

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
    protected $hidden = [
        'password', 
        'remember_token', 
        'created_at', 
        'updated_at',
        'email_verified_at',
        'access_token',
        'token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['user_type' ];


    /** 
     * Obtiene el tipo de usuario
     *
     * @return string
     */
    public function getUserTypeAttribute()
    {
        return $this->table;
    }

    /** 
     * Obtiene el tipo de usuario autenticado
     *
     * @return object
     */
    public static function authUser()
    {
        return Auth::guard('students')->user()
            ?? Auth::guard('workers')->user()
            ?? Auth::user();
    }
}
