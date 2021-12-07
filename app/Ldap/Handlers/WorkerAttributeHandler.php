<?php

namespace App\Ldap\Handlers;

use App\Models\Auth\User;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class WorkerAttributeHandler
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
        // Obtiene los apellidos del usuario.
        $surnames = explode(' ', $ldapUser->getFirstAttribute('sn'), 2);

        // Recupera o guarda la información del usuario en nuestra base de datos, en caso de que no exista.
        $databaseUser->email = $ldapUser->getFirstAttribute('mail');
        $databaseUser->name = $ldapUser->getFirstAttribute('givenname');
        $databaseUser->middlename = $surnames[0];
        $databaseUser->surname = $surnames[1];
    }
}
