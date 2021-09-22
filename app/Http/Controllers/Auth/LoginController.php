<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        
        # Guarda el nombre de la modal, en caso de que exista.
        if ($request->nombreModal !== null)
            $request->session()->put('nombreModal', $request->nombreModal);

        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([ 'guest:web','guest:students','guest:workers' ])->except('logout');
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
        $user = $request->user('workers') 
            ?? $request->user('students')
            ?? $request->user('web');

        if (Auth::guard('workers')->check())
            Log::info('Inicio de sesión como trabajador');
        else if (Auth::guard('students')->check())
            Log::info('Inicio de sesión como estudiante');
        else if (Auth::guard('web')->check())
            Log::info('Inicio de sesión como externo');

        Log::info('Datos de usuario: ', $user->toArray());

        return redirect($this->redirectTo);
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
        $user_request = Http::post('http://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', [ 'username' => $request->email ]);

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
