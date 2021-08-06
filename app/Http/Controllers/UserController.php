<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Models\Auth\User;


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
        $user = User::retrieveBySearchKey(
            $request->search_key, $request->search_value, $request->user_type
        );
        
        return $user;
    }
}
