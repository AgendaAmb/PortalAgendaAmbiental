<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;


class TokenController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Token Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles encrypted personal access tokens from other 
    | applications and retrieves the information of the authenticated user.
    */

    /**
     * Determines if the expired token is valid.
     *
     * @var string
     */
    public function tokenStatus(Request $request)
    {
        # Desencripta el token
        $decrypter = new Encrypter('aj3nd@_amViEntAl');
        $token = $decrypter>encrypt($request->token);

        # Busca el token en los usuarios
        $user = Extern::firstWhere('access_token', $token)
             ?? Student::firstWhere('access_token', $token)
             ?? Worker:: firstWhere('access_token', $token);

        # Los tokens no coinciden.
        if ($user === null || $request->token === null)
            return response()->json([
                'message' => 'Token inválido'
            ], 401);
        

        return response()->json([
            'message' => 'Válido',
            'mi_portal_user_id' => $user->id,
            'mi_portal_user_type' => $user->user_type
        ]);
    }

    /**
     * Retrieves the authenticated user, by its bearer token.
     *
     * @var string
     */
    public function user(Request $request)
    {
        # Busca el token en los usuarios
        return $request->user();
    }
}
