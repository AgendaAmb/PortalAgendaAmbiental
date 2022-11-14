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
use Illuminate\Validation\ValidationException;

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
        return redirect($this->redirectTo);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */

    /*
    public function login(Request $request){//sobrescribir funcion que ya existe (en AutenticateUsers)
        $siono = $this->attemptLogin($request);
        if($siono){
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return redirect($this->redirectTo);
        }
        return back();
    }
    */
    
    protected function attemptLogin(Request $request)
    {
        //return "Hola";
        $useremail = "";
        if(!str_contains($request->email,"@")){
            $tmpuser = User::find($request->email);
            $useremail = $tmpuser->email;
        }else{
            $tmpuser = User::firstWhere('email', $request->email);
            $useremail = $request->email;
        }

        # Inicio de sesión como trabajador
        if (Auth::guard('workers')->attempt([ 'mail' => $useremail, 'password' => $request->password ])
        ||  Auth::guard('workers')->attempt([ 'samaccountname' => $useremail, 'password' => $request->password ]))
            return true;

        # Inicio de sesión como alumno
        if (Auth::guard('students')->attempt([ 'mail' => $useremail, 'password' => $request->password ])
        ||  Auth::guard('students')->attempt([ 'id' => $useremail, 'password' => $request->password ]))
            return true;

        # Inicio de sesión como externo.
        if (Auth::attempt([ 'email' => $useremail, 'password' => $request->password ]))
            return true;

        # Inicio de sesión no exitoso.
        throw ValidationException::withMessages([ 
            'email' => 'Usuario y/o contraseña incorrectos.' 
        ]);
    }
}
