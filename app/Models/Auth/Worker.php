<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Worker extends User
{
    use AuthenticatesWithLdap, HasLdapUser;

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
    protected $guard_name = 'workers';

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
        return User::where('type', Worker::class)->get();
    }


    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return parent::roles()->wherePivot('model_type', Worker::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops(): BelongsToMany
    {
        return parent::workshops()->wherePivot('user_type', Worker::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules(): BelongsToMany
    {
        return parent::userModules()->wherePivot('user_type', Worker::class);
    }

    /**
     * Devuelve los datos registrados en cada unirodada del usuario.
     *
     * @return object
     */
    public function unirodadasUser(): HasManyThrough
    {
        return parent::unirodadasUser()->where('user_type', Worker::class);
    }

    /**
     * A model may have multiple roles.
     */
    public static function find($id)
    {
        return self::where('id', $id)->where('type', Worker::class)->first();
    }
}
