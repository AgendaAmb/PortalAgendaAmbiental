<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Providers\RouteServiceProvider;
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
        # Valida el correo de la uaslp.
        $response = Http::post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', [
            'username' => $data['email'] ?? null
        ]);


        # Guarda el directorio activo en la sesión.
        if ($response->status() === 200)
        {
            $response_data = $response->json()['data'];

            session([ 
                'DirectorioActivo' => $response_data['DirectorioActivo'],
                'ClaveUASLP' => $response_data['ClaveUASLP']
            ]);
        }

        # Valida los datos de registro
        return  Validator::make($data, [
            'Nombres' => [ 'required', 'string', 'max:255' ],
            'ApellidoP' => [ 'required', 'string', 'max:255' ],
            'ApellidoM' => [ 'nullable', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:externs,email', 'unique:students,email', 'unique:workers,email' ],
            
            # Solo se solicita a externos.
            'password' => [ Rule::requiredIf($response->status() !== 200) ],
            'passwordR' => [ Rule::requiredIf($response->status() !== 200), 'same:password' ],
            'Pais' => [ 'required' ],
            'CURP' => [ 'required_if:Pais,México','size:18', 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i' ], 
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
        # Crea al usuario.
        $new_user_data = [

            # Datos de identidad
            'curp' => $data['CURP'] ?? null,
            'nationality' => $data['Pais'],

            # Datos de contacto.
            'email' => $data['email'],
            'phone_number' => $data['Tel'],

            # Nombres
            'name' => $data['Nombres'],

            # Apellidos
            'middlename' => $data['ApellidoP'],
            'surname' => $data['ApellidoM'] ?? null,  

            # Facultad o dependencia de la UASLP.
            'dependency' => $data['Dependencia'] ?? null, 
            'password' => Hash::make($data['password'] ?? null)
        ];

        # Usuario y auth guard.
        [ $user, $guard ] = $this->createUser($new_user_data);        

        # Asigna rol de usuario.
        $user->assignRole('user');

        # Autentica al usuario.
        Auth::guard($guard)->login($user);
        
        return $user;
    }

    /**
     * Creates the user model.
     *
     * @param  array  $new_user_data
     * @return array
     */
    private function createUser(array $new_user_data)
    {
        # Tipo de usuario, en base al DA
        switch (session('DirectorioActivo'))
        {
            case 'ALUMNOS': 

                $new_user_data['id'] = session('ClaveUASLP');
                $user = Student::create($new_user_data); 
                $guard = 'students';
                
                break;

            case 'UASLP':   
                
                $new_user_data['id'] = session('ClaveUASLP');
                $user = Worker::create($new_user_data); 
                $guard = 'workers';

                break;

            default: 

                # El usuario externo no pertenece a ninguna facultad
                unset($new_user_data['dependency']);
                $user = Extern::create($new_user_data);
                $guard = 'web';

                break;
        }

        return [ $user, $guard ];
    }
}