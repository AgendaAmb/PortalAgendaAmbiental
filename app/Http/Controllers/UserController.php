<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the user data
    */

    /**
     * Retrieves the authenticated user, by its bearer token.
     *
     * @var string
     */
    public function user(SearchUserRequest $request)
    {
        # Recupera al usuario.
        $user = null;

        # Clave de búsqueda de usuarios.
        $search_key = $request->search_key;

        # Valor de búsqueda de usuarios.
        $search_value = $request->search_value;

        # Tipo de usuario
        $user_type = $request->user_type;

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
}
