<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Student extends User implements LdapAuthenticatable
{
    use AuthenticatesWithLdap, HasLdapUser;

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
    ];

    /**
     * Model table.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Model guard.
     *
     * @var string
     */
    protected $guard_name = 'students';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @return object
     */
    public static function all($columns = ['*'])
    {
        return User::where('type', Student::class)->get();
    }

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return parent::roles()->wherePivot('model_type', Student::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops(): BelongsToMany
    {
        return parent::workshops()->wherePivot('user_type', Student::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules(): BelongsToMany
    {
        return parent::userModules()->wherePivot('user_type', Student::class);
    }

    /**
     * Devuelve los datos registrados en cada unirodada del usuario.
     *
     * @return object
     */
    public function unirodadasUser()
    {
        return parent::unirodadasUser()->where('user_type', Student::class);
    }

    /**
     * A model may have multiple roles.
     */
    public static function find($id)
    {
        return self::where('id', $id)->where('type', Student::class)->first();
    }
}