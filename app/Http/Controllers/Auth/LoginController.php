<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Retrieve the login credentials.
     *
     * @return void
     */
    protected function credentials(Request $request)
    {
        # Credenciales de acceso.
        $credentials = [
            'password' => $request->password,
            'fallback' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
        ];

        # Datos del API si existen.
        $user_request = Http::post('locahost:8000/api/users/uaslp-user', [
            'username' => $request->email
        ]);

        if ($user_request->status() === 200)

            # Credenciales del api
            $credentials['mail'] = $user_request->json()['data']['email'];
        else

            # Credenciales del sistema
            $credentials['email'] = $request->email;

        return $credentials;
    }


}
