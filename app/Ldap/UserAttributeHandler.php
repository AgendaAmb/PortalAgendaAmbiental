<?php

namespace App\Ldap;

use App\Models\Auth\User;
use App\Models\Auth\Worker;
use Illuminate\Validation\ValidationException;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class UserAttributeHandler
{
    /**
     * Determina la forma de guardar los atributos del usuario del directorio activo
     * en la base de datos.
     *
     * @param LdapUser $ldapUser
     * @param User $databaseUser
     */
    public function handle(LdapUser $ldapUser, User $databaseUser)
    {
        $databaseUser = Worker::find($databaseUser->id);

        # Verifica que el usuario tenga un rol
        if ($databaseUser->roles()->count() === 0)
            throw ValidationException::withMessages([ 
                'email' => 'Debes de registrarte, antes de poder acceder.' 
            ]);


        // Obtiene los apellidos del usuario.
        $surnames = explode(' ', $ldapUser->getFirstAttribute('sn'), 2);

        // Recupera o guarda la información del usuario en nuestra base de datos, en caso de que no exista.
        $databaseUser->email = $ldapUser->getFirstAttribute('mail');
        $databaseUser->name = $ldapUser->getFirstAttribute('givenname');
        $databaseUser->middlename = $surnames[0];
        $databaseUser->surname = $surnames[1];
    }
}
