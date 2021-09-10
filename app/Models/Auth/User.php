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
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    # Trait para gestionar tokens.
    use HasApiTokens, 
    
    # Trait para enviar correos.
    Notifiable,

    # Trait para gestionar roles.
    HasRoles, 
    
    # Trait para gestionar módulos.
    ModuleTrait, 
    
    # Trait para gestionar los cursos y talleres.
    WorkshopTrait, 
    
    # Trait para aplicar "soft delete" a los modelos.
    SoftDeletes;

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
    protected $with = ['workshops', 'roles'];

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
        $unirodadaData = DB::table('unirodada_users')
            ->select('emergency_contact')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->emergency_contact ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setEmergencyContactAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'emergency_contact' => $value ]);
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
        $unirodadaData = DB::table('unirodada_users')
            ->select('emergency_contact_phone')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->emergency_contact_phone ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setEmergencyContactPhoneAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'emergency_contact_phone' => $value ]);
    }

    /**
     * Actualiza la condición de salud del usuario.
     *
     * @return object|null
     */
    public function getHealthConditionAttribute()
    {
        $unirodadaData = DB::table('unirodada_users')
            ->select('health_condition')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->health_condition ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setHealthConditionAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'health_condition' => $value ]);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getInvoiceDataAttribute()
    {
        $unirodadaData = DB::table('unirodada_users')
            ->select('invoice_data')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->invoice_data ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function setInvoiceDataAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'invoice_data' => json_encode($value) ]);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getGrupoCiclistaAttribute()
    {
        $unirodadaData = DB::table('unirodada_users')
            ->select('group')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->group ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setGrupoCiclistaAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'group' => $value ]);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getSentAttribute()
    {
        $unirodadaData = DB::table('unirodada_users')
            ->select('user_workshop.sent as sent')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->latest('unirodada_users.created_at')
            ->first();

        return $unirodadaData->sent ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setSentAttribute($value)
    {
        DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', 'Unirodada cicloturística a la Cañada del Lobo')
            ->update([ 'sent' => $value ]);
    }
}
