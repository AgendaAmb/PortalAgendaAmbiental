<?php

namespace App\Models\Auth;

use App\Models\Module;
use App\Models\UnirodadaUser;
use App\Models\UserWorkshop;
use App\Models\Workshop;
use App\Notifications\VerifyEmail;
use App\Traits\ModuleTrait;
use App\Traits\WorkshopTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Models\Role;
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
        'deleted_at',
        'email_verified_at',
        'access_token',
        'token',
        'guid',
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
    protected $appends = [
        'user_type',
        'invoice_data',
        'invoice_url',
        'lunch',
        'paid',
        'paid_at'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'workshops:id,name,description,type,work_edge,start_date,end_date',
        'roles:id,name',
        'userModules',
        'unirodadasUser',
        'unirodadasUser.userWorkshop'
    ];


    /**
     * The user classes used by this class.
     *
     * @var array
     */
    public const USER_TYPES = [
        'workers' => Worker::class,
        'students' => Student::class,
        'externs' => Extern::class
    ];

    /**
     * The user classes used by this class.
     *
     * @var array
     */
    public const COLUMNS = [
        'id',
        'type',
        'name',
        'middlename',
        'surname',
        'age',
        'gender',
        'nationality',
        'residence',
        'zip_code',
        'email',
        'altern_email',
        'phone_number',
        'curp',
        'ocupation',
        'ethnicity',
        'disability',
        'courses',
        'interested_on_further_courses',
        'comments',
        'created_at',
        'email_verified_at',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        /*
        static::retrieved(function ($user) {
            $user->load([
                'roles' => fn($q) => $q->select('id','name')->where('model_type', $user->type),
            ]);
        });*/
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
     * Obtiene el tipo de usuario
     *
     * @return string
     */
    public function getUserTypeAttribute()
    {
        if ($this->type === Worker::class)
            return 'workers';
        else if ($this->type === Student::class)
            return 'students';
        else if ($this->type === Extern::class)
            return 'externs';

        return $this->guard_name;
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
        return $this->unirodadasUser->last()->emergency_contact ?? null;
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
        $this->setUnirodadaDetailsField('emergency_contact',$value);
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
        return $this->unirodadasUser->last()->emergency_contact_phone ?? null;
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
        return $this->unirodadasUser->last()->health_condition ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setHealthConditionAttribute($value): void
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
        return $this->unirodadasUser->last()->invoice_data?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function setInvoiceDataAttribute($value): void
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
        $invoice_data = $this->unirodadasUser->last()->invoice_data ?? '{}';

        $data = json_decode((string)$invoice_data, true);
        return $data['file_path'] ?? null;
    }

    /**
     * Actualiza el grupo del ciclista del usuario.
     *
     * @return object|null
     */
    public function getGrupoCiclistaAttribute()
    {
        return $this->unirodadasUser->last()->group ?? null;
    }

    /**
     * Returns the data of the unirodada from the user, if it
     * has one
     *
     *
     * @return object|null
     */
    public function setGrupoCiclistaAttribute($value): void
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
        return $this->unirodadasUser->last()->lunch ?? null;
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
        $user_workshop = $this->unirodadasUser->last()->userWorkshop ?? null;
        return $user_workshop->sent ?? null;
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
        $user_workshop = $this->unirodadasUser->last()->userWorkshop ?? null;
        return $user_workshop->paid ?? null;
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
    public function getPaidAtAttribute()
    {
        $user_workshop = $this->unirodadasUser->last()->userWorkshop ?? null;
        return $user_workshop->paid_at ?? null;
    }

    /**
     * Determina si el usuario pagó su cuota de inscripción a la unirodada.
     *
     * @return object|null
     */
    public function setPaidAtAttribute($value): void
    {
        $this->setUnirodadaDetailsField('user_workshop.paid_at', $value);
    }

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'model_has_roles',
            'model_id',
            'role_id',
            'id',
            'id'
        )->withPivot('model_type');
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops(): BelongsToMany
    {
        return $this->belongsToMany(
            Workshop::class,
            'user_workshop',
            'user_id',
            'workshop_id',
            'id',
            'id'
        )->withPivot(
            'id',
            'user_type',
            'sent',
            'sent_at',
            'paid',
            'paid_at'
        );
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules(): BelongsToMany
    {
        return $this->belongsToMany(
            Module::class,
            'module_user',
            'user_id',
            'module_id',
            'id',
            'id'
        )->withPivot('user_type');
    }

    /**
     * Assign the given role to the model.
     *
     * @param array|string|int|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function assignRole(...$roles): void
    {
        foreach ($roles as $role)
        {
            if (is_int($role))
                $this->roles()->attach($role, ['model_type' => static::class]);

            else if(is_string($role))
            {
                $role_id = Role::where('name', $role)->where('guard_name', $this->guard_name)->value('id');
                $this->roles()->attach($role_id, ['model_type' => static::class]);
            }
        }
    }

    /**
     * Assign the given workshop to the model.
     *
     * @param array|string|int|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function assignWorkshop(...$workshops): void
    {
        foreach ($workshops as $workshop)
        {
            if (is_int($workshop))
                $this->workshops()->attach($workshop, ['user_type' => static::class, 'sent' => false]);

            else if(is_string($workshop))
            {
                $workshop_id = Workshop::where('name', $workshop)->value('id');
                $this->workshops()->attach($workshop_id, ['user_type' => static::class, 'sent' => false]);
            }
        }
    }

    /**
     * Assign the given module to the model.
     *
     * @param array|string|int|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function assignModule(...$modules): void
    {
        foreach ($modules as $module)
        {
            if (is_int($module))
                $this->modules()->attach($module, ['user_type' => static::class]);
            else if (is_a($module, Module::class))
                $this->modules()->attach($module->id, ['user_type' => static::class]);
            else if(is_string($module))
            {
                $module_id = Workshop::where('name', $module)->value('id');

                if ($module_id !== null)
                    $this->workshops()->attach($module_id, ['user_type' => static::class]);
            }
        }
    }

    /**
     * Devuelve los datos registrados en cada unirodada del usuario.
     *
     * @return object
     */
    public function unirodadasUser(): HasManyThrough
    {
        return $this->hasManyThrough(
            UnirodadaUser::class,   # Tabla donde están los datos de la unirodada
            UserWorkshop::class,    # Tabla por la cual se accede a la tabla destino
            'user_id',              # Llave que asocia al modelo con la tabla intermedia.
            'user_workshop_id',     # Llave que utiliza la tabla intermedia, para asociarse
                                    # con la tabla intermedia.
            'id',                   # Clave primaria de la tabla de usuarios.
            'id',                   # Clave primaria de la tabla pivote.

        );
    }

    /**
     * Obtiene un arreglo de los talleres registrados por el usuario.
     *
     * @return array
     */
    public function getRegisteredWorkshops(): array
    {
        $workshops = $this->workshops->each(function (&$workshop) {

            $workshop->asistenciaUsuario = $workshop->pivot->assisted_to_workshop ?? null;

            if ($workshop->pivot !== null) {
                unset($workshop->pivot);
            }

        });

        return $workshops->toArray();
    }
}
