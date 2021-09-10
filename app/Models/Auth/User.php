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
        'token',
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
    protected $appends = ['user_type'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['workshops'];

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
        return Auth::guard('students')->user() ?? Auth::guard('workers')->user() ?? Auth::user();
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

        switch ($user_type)
        {
            case 'students':$user = Student::find($user_id); break;
            case 'workers':$user = Worker::find($user_id); break;
            case 'externs':$user = Extern::find($user_id); break;
        }

        return $user;
    }

    /**
     * Retrieves an user by its id.
     *
     * @return object
     */
    public static function userById($user_id)
    {
        # Recupera al usuario.
        $user = Student::find($user_id)
            ??  Worker::find($user_id)
            ??  Extern::find($user_id);

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

        switch ($user_type)
        {
            case 'students':
                $user = Student::firstWhere($search_key, $search_value);
                break;

            case 'workers':
                $user = Worker::firstWhere($search_key, $search_value);
                break;

            case 'externs':
                $user = Extern::firstWhere($search_key, $search_value);
                break;

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
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function getEmergencyContactAttribute()
    {
        return $this->latestUnirodadaUserData()->emergency_contact ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function getEmergencyContactPhoneAttribute()
    {
        return $this->latestUnirodadaUserData()->emergency_contact_phone ?? null;
    }

    /**
     * Actualiza la condición de salud del usuario.
     *
     * @return object|null
     */
    public function getHealthConditionAttribute()
    {
        return $this->latestUnirodadaUserData()->health_condition ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getInvoiceDataAttribute()
    {
        return $this->latestUnirodadaUserData()->invoice_data ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function setInvoiceDataAttribute($value)
    {
        $new_invoice_data = json_encode($value);

        # Obtiene la unirodada más reciente del usuario.
        $latest_user_unirodada = $this->latestUnirodadaUserData();

        $latest_user_unirodada->invoice_data = $new_invoice_data;
        $latest_user_unirodada->save();
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getQuotePaidAttribute()
    {
        return $this->latestUnirodadaUserData()->invoice_data ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     *
    public function setInvoiceDataAttribute($value)
    {
        $new_invoice_data = json_encode($value);

        # Obtiene la unirodada más reciente del usuario.
        $latest_user_unirodada = $this->latestUnirodadaUserData();

        $latest_user_unirodada->invoice_data = $new_invoice_data;
        $latest_user_unirodada->save();
    }*/


    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getGrupoCiclistaAttribute()
    {
        return $this->latestUnirodadaUserData()->group ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getSentAttribute()
    {
        return $this->latestUnirodada()->pivot->sent ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function updateUnirodadaData($workshop, array $array)
    {
        # Registra la unirodada, si el usuario no está registrado
        if (!$this->hasWorkshop($workshop->name))
            $this->workshops()->attach($workshop->id, ['sent' => false]);

        # Obtiene el modelo de la tabla pivote.
        $pivot = $this->workshopPivots()->firstWhere('workshop_id', $workshop->id);

        # Actualiza los datos de la unirodada.
        $pivot->unirodadaUser()->updateOrCreate($array);
    }
}
