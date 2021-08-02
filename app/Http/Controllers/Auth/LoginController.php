<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

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
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {   
        /** @var User */
        # Obtiene el usuario autenticado
        $user = Auth::guard('students')->user()
             ?? Auth::guard('workers')->user()
             ?? Auth::user();

        # Genera el token y lo guarda como encabezado.
        $token = $user->createToken('AccessToken')->accessToken;

        return redirect($this->redirectTo)->cookie('AccessToken', $token);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        # Datos del API si existen.
        $user_request = Http::post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', [ 'username' => $request->email ]);

        # Intenta acceder como externo.
        if ($user_request->status() !== 200)
            return Auth::guard('web')->attempt($request->only('email', 'password'));

        $user_data = $user_request->json()['data'];
        
        # Acceder como trabajador.
        if ($user_data['DirectorioActivo'] === 'UASLP')
            return Auth::guard('workers')->attempt([ 'mail' => $user_data['email'], 'password' => $request->password ]);

        # Acceder como alumno.
        else
            return Auth::guard('students')->attempt([ 'mail' => $user_data['email'], 'password' => $request->password ]);
    }
}
