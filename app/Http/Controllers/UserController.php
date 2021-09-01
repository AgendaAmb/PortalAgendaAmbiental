<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Models\Auth\User;
use Illuminate\Http\JsonResponse;
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
     * Retrieves an user by search parameters.
     *
     * @var string
     */
    public function search(SearchUserRequest $request)
    {
        # Recupera al usuario.
        $user = User::retrieveBySearchKey(
            $request->search_key, $request->search_value, $request->user_type
        );
        
        return $user;
    }

    /**
     * Retrieves an user.
     *
     * @return User
     */
    public function show($user_type, $user_id)
    {
        # Recupera al usuario.
        return User::retrieveById($user_id, $user_type);
    }

    /**
     * Retrieves the current authenticated user.
     *
     * @var string
     */
    public function whoAmI(Request $request)
    {
        return $request->user();
    }

    /**
     * Retrieves the current authenticated user.
     *
     * @var string
     */
    public function updateUserData(Request $request)
    {
        $user = User::retrieveById($request->id, $request->user_type);
        $user->residence = $request->residence ?? $user->residence;
        $user->ocupation = $request->ocupation ?? $user->ocupation;
        $user->disability = $request->disability ?? $user->disability;
        $user->interested_on_further_courses = $request->interested_on_further_courses ?? $user->interested_on_further_courses;
        $user->save();
        

        return response()->json([ 'message' => 'cool' ], JsonResponse::HTTP_OK);
    }
}
