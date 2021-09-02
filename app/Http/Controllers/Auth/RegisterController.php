<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
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

            # Etnia
            'ethnicity' => $data['GEtnico'] ?? null,

            # Género
            'gender' => isset($data['OtroGenero']) && $data['OtroGenero'] !== null
                    ? $data['Genero'].' - '.$data['OtroGenero']
                    : $data['Genero'] ?? null,

            # Lugar de residencia
            'residence' => $data['LugarResidencia'] ?? null,

            # Lugar de residencia
            'altern_email' => $data['CorreoAlterno'] ?? null,

            # Lugar de residencia
            'ocupation' => $data['Ocupacion'] ?? null,

            # Código postal
            'zip_code' => $data['CP'] ?? null,

            # Discapacidad
            'disability' => $data['Discapacidad'] ?? null,

            # Facultad o dependencia de la UASLP.
            'dependency' => $data['Dependencia'] ?? null,
            'DirectorioActivo' => $data['DirectorioActivo'] ?? null,
            'ClaveUASLP' => $data['ClaveUASLP'] ?? null,
            'password' => Hash::make($data['password'] ?? null)
        ];

        # Usuario y auth guard.
        [ $user, $guard ] = $this->createUser($new_user_data);

        # Asigna rol de usuario.
        $user->assignRole('user');
        $user->save();

        # Autentica al usuario y genera su token personal.
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
        switch ($new_user_data['DirectorioActivo'])
        {
            case 'ALUMNOS':

                $id = $new_user_data['ClaveUASLP'];
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                $user = Student::updateOrCreate([ 'id' => $id ],  $new_user_data);
                $guard = 'students';

                break;

            case 'UASLP':

                $id = $new_user_data['ClaveUASLP'];
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                $user = Worker::updateOrCreate([ 'id' => $id ],  $new_user_data);
                $guard = 'workers';

                if ($new_user_data['email'] === 'eugenia.almendarez@uaslp.mx')
                    $user->assignRole('administrator');
                else if ($new_user_data['email'] === 'laura.rodriguez@uaslp.mx')
                    $user->assignRole('coordinator');
                break;

            default:

                # El usuario externo no pertenece a ninguna facultad
                unset($new_user_data['dependency']);
                unset($new_user_data['DirectorioActivo']);
                unset($new_user_data['ClaveUASLP']);
                unset($new_user_data['CorreoAlterno']);
                $user = Extern::create($new_user_data);
                $guard = 'web';

                break;
        }

        return [ $user, $guard ];
    }
}
