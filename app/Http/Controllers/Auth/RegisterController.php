<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $ip = env('CENTRAL_APP');
       
        $response = Http::post($ip.'/api/users/uaslp-user', [
            'username' => $data['email'] ?? null
        ]);
       
        return Validator::make($data, [
            'Nombres' => [ 'required', 'string', 'max:255' ],
            'ApellidoP' => [ 'required', 'string', 'max:255' ],
            'ApellidoM' => [ 'nullable', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users,email' ],
            'password' => [ Rule::requiredIf($response->status() !== 200) ],
            'passwordR' => [ Rule::requiredIf($response->status() !== 200), 'same:password' ],
            'Pais' => [  'required' ],
            'CURP' => [ 'required_if:Pais,México','size:18', 'pattern:/^(?=.{10,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=^\S+$)(?=.*[@$!%*#?&]).*$/i' ], 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return mixed
     */
    protected function create(array $data)
    {
       
        # Nuevo usuario.
        $user = new User;
        $user->curp = $data['CURP'];
        $user->nationality = $data['Pais'];
        $user->email = $data['email'];
        $user->phone_number = $data['Tel'];
        $user->name = $data['Nombres'];
        $user->middlename = $data['ApellidoP'];
        $user->surname = $data['ApellidoM'];
        $user->password = Hash::make($data['password']);


        # Almacena al usuario.
        $user->save();
        Auth::login($user);
        
        return $user;
    }
}
