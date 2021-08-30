<?php

namespace App\Models\Auth;

use App\Notifications\VerifyEmail;
use App\Traits\ModuleTrait;
use App\Traits\WorkshopTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable,
        HasRoles, ModuleTrait, WorkshopTrait, SoftDeletes;

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
     * Obtiene el tipo de usuario
     *
     * @return string
     */
    public function getGuardAttribute()
    {
        return $this->guard_name;
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

    /**
     * Retrieves the specified user (Worker, Student, Extern) by
     * id and type
     *
     * @return object
     */
    public static function retrieveById($user_id, $user_type)
    {
        # Recupera al usuario.
        $user = null;

        switch($user_type)
        {
            case 'students' : $user = Student::find($user_id); break;
            case 'workers'  : $user = Worker::find($user_id); break;
            case 'externs'  : $user = Extern::find($user_id); break;
        }

        return $user;
    }

    /**
     * Retrieves the specified user (Worker, Student, Extern) by
     * id and type
     *
     * @return object
     */
    public static function retrieveBySearchKey($search_key, $search_value, $user_type)
    {
        # Recupera al usuario.
        $user = null;

        switch($user_type)
        {
            case 'students' : $user = Student::firstWhere($search_key, $search_value); break;
            case 'workers'  : $user = Worker::firstWhere($search_key, $search_value); break;
            case 'externs'  : $user = Extern::firstWhere($search_key, $search_value); break;

            case '*':

                $user = Extern::firstWhere($search_key, $search_value)
                     ?? Worker::firstWhere($search_key, $search_value)
                     ?? Student::firstWhere($search_key, $search_value);

                break;
        }

        return $user;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function getRegisteredWorkshops()
    {
        $workshops = $this->workshops()->select('id', 'name', 'description')
        ->get()->each(function(&$workshop){
            $workshop->asistenciaUsuario = $workshop->pivot->assisted_to_workshop ?? null;

            if ($workshop->pivot !== null)
                unset($workshop->pivot);
        });

        return $workshops->toArray();
    }
}
