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
    protected $appends = ['user_type','invoice_data', 'invoice_url', 'lunch'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['workshops:id,name,description', 'roles:id,name', 'userModules:id,name'];


    /**
     * The user classes used by this class.
     *
     * @var array
     */
    protected const USER_TYPES = [
        'workers' => Worker::class,
        'students' => Student::class,
        'externs' => Extern::class
    ];

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
     * Genera una consulta ORM, para obtener campos adicionales,
     * acerca del usuario y de la unirodada especificada.
     *
     * @param string
     * @return object
     */
    public function getUnirodadaDetailsQuery($unirodada)
    {
        return DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop_id', '=', 'user_workshop.id')
            ->join('workshops', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->where('user_workshop.user_id', '=', $this->id)
            ->where('user_type', '=', static::class)
            ->where('workshops.name', '=', $unirodada);
    }

    /**
     * Obtiene un campo específico, acerca del usuario y su asistencia a
     * algún evento de la unirodada.
     *
     * @param string $field
     * @return object
     */
    public function getUnirodadaDetailsField($field)
    {
        return $this->getUnirodadaDetailsQuery(
            'Unirodada cicloturística a la Cañada del Lobo'
        )->latest('unirodada_users.created_at')
        ->value($field)

        ?? null;
    }

    /**
     * Asigna un valor a campo específico, acerca del usuario y su asistencia
     * a algún evento de la unirodada.
     *
     * @param string $field
     * @return object
     */
    public function setUnirodadaDetailsField($field, $value)
    {
        $this->getUnirodadaDetailsQuery(
            'Unirodada cicloturística a la Cañada del Lobo'
        )->update([
            $field => $value
        ]);
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
        return $this->getUnirodadaDetailsField('emergency_contact');
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
        $this->setUnirodadaDetailsField('emergency_contact', $value);
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
        return $this->getUnirodadaDetailsField('emergency_contact_phone');
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
        $this->setUnirodadaDetailsField('emergency_contact_phone', $value);
    }

    /**
     * Actualiza la condición de salud del usuario.
     *
     * @return object|null
     */
    public function getHealthConditionAttribute()
    {
        return $this->getUnirodadaDetailsField('health_condition');
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
        $this->setUnirodadaDetailsField('health_condition',$value);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getInvoiceDataAttribute()
    {
        return $this->getUnirodadaDetailsField('invoice_data');
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function setInvoiceDataAttribute($value)
    {
        if ($value === 'null')
            $this->setUnirodadaDetailsField('invoice_data', null);
        $this->setUnirodadaDetailsField('invoice_data', json_encode($value));
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getInvoiceUrlAttribute()
    {
        $data = json_decode((string)$this->getUnirodadaDetailsField('invoice_data'), true);
        return $data['file_path'] ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getGrupoCiclistaAttribute()
    {
        return $this->getUnirodadaDetailsField('group');
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
        $this->setUnirodadaDetailsField('group', $value);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getLunchAttribute()
    {
        return $this->getUnirodadaDetailsField('lunch');
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setLunchAttribute($value)
    {
        $this->setUnirodadaDetailsField('lunch', $value);
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getSentAttribute()
    {
        return $this->getUnirodadaDetailsField('user_workshop.sent');
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
        $this->setUnirodadaDetailsField('sent', $value);
    }

    /**
     * Determina si el usuario pagó su cuota de inscripción a la unirodada.
     *
     * @return object|null
     */
    public function getPaidAttribute()
    {
        return $this->getUnirodadaDetailsField('user_workshop.paid');
    }

    /**
     * Determina si el usuario pagó su cuota de inscripción a la unirodada.
     *
     * @return object|null
     */
    public function setPaidAttribute($value)
    {
        $this->setUnirodadaDetailsField('user_workshop.paid', $value);
    }

    /**
     * Determina si el usuario pagó su cuota de inscripción a la unirodada.
     *
     * @return object|null
     */
    public function getPaidAtAttribute($value)
    {
        return $this->getUnirodadaDetailsField('user_workshop.paid_at');
    }

    /**
     * Determina si el usuario pagó su cuota de inscripción a la unirodada.
     *
     * @return object|null
     */
    public function setPaidAtAttribute($value)
    {
        $this->setUnirodadaDetailsField('user_workshop.paid_at', $value);
    }
}
