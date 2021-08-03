<?php

namespace App\Models\Auth;

use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles;

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
        'email_verified_at'
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
    protected $appends = ['user_type', 'token' ];

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules()
    {
        return $this->morphToMany(Module::class, 'user', 'module_user');
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param string $module
     * @return bool
     */
    public function hasModule(string $module)
    {
        return $this
        ->userModules()
        ->where('name', $module)
        ->count() > 0;
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param Module $module
     * @return bool
     */
    public function hasAnyModule(array $modules)
    {
        return $this
        ->userModules()
        ->whereIn('name', $modules)
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
                ->wherePivot('module_id', $module->id)
                ->wherePivotNotNull('email_verified_at')
                ->get() !== null;
    }

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
     * Obtiene el tipo de usuario
     *
     * @return void
     */
    public function generateToken()
    {
        $this->tokens()->delete();
        $this->access_token = $this->createToken('AccessToken')->accessToken;
        $this->save();
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
