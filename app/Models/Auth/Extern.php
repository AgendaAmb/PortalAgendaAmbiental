<?php

namespace App\Models\Auth;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Extern extends User
{
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
    protected $guard_name = 'web';

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
        'access_token'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @return object
     */
    public static function all($columns = ['*'])
    {
        return User::where('type', Extern::class)->get();
    }

    /**
     * Devuelve los datos registrados en cada unirodada del usuario.
     *
     * @return object
     */
    public function unirodadasUser(): HasManyThrough
    {
        return parent::unirodadasUser()->where('user_type', Extern::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops(): BelongsToMany
    {
        return parent::workshops()->wherePivot('user_type', Extern::class);
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function userModules(): BelongsToMany
    {
        return parent::userModules()->wherePivot('user_type', Extern::class);
    }

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return parent::roles()->wherePivot('model_type', Extern::class);
    }

    /**
     * A model may have multiple roles.
     */
    public static function find($id)
    {
        return self::where('id', $id)->where('type', Extern::class)->first();
    }
}
