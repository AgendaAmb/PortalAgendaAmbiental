<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements LdapAuthenticatable //,MustVerifyEmail
{
    use Notifiable, AuthenticatesWithLdap, HasLdapUser, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules()
    {
        return $this->belongsToMany(Module::class);
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param Module $module
     * @return bool
     */
    public function hasModule(Module $module)
    {
        return $this
        ->userModules()
        ->where('id', $module->id)
        ->count() > 0;
    }

    /**
     * Asocia al usuario un módulo.
     *
     * @param Module $module
     * @return void
     */
    public function attachModule(Module $module)
    {
        $this->userModules()->attach($module->id);
    }

    /**
     * Desasocia al usuario un módulo.
     *
     * @param Module $module
     * @return void
     */
    public function detachModule(Module $module)
    {
        $this->userModules()->detach($module->id);
    }

    /**
     * Verifica el correo electrónico del usuario en
     * el módulo indicado.
     *
     * @param Module $module
     * @return void
     */
    public function verifyEmailOn(Module $module)
    {
        $this->userModules()
             ->updateExistingPivot($module->id, [
            'email_verified_at' => Carbon::now()
        ]);
    }

    /**
     * Verifica el correo electrónico del usuario en
     * el módulo indicado.
     *
     * @param Module $module
     * @return void
     */
    public function hasEmailVerifiedOn(Module $module)
    {
        return $this
                ->userModules()
                ->wherePivot('oauth_client_id', $module->id)
                ->wherePivotNotNull('email_verified_at')
                ->get() !== null;
    }
}
