<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUsersRequest;
use App\Mail\RegisteredTo17Gemas;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\Models\Auth\Worker;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the user data
    */
    private $curp_pattern = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';

    /**
     * Tipos de usuario
     *
     * @var array
     */
    private const USER_TYPES = [
        'ALUMNOS' => Student::class,
        'UASLP' => Worker::class,
        'EXTERNO' => Extern::class,
    ];

    /**
     * Creates a new user.
     *
     * @param array $data
     */
    private function newUser($data)
    {
        $cropped_data = collect($data)->except(['pertenece_uaslp'])->toArray();

        try{
             # Asigna el id al usuario.
            if ($data['pertenece_uaslp'] === true)
            {
                $cropped_data['id'] = $data['clave_uaslp'];
                $cropped_data['type'] = self::USER_TYPES['ALUMNO']; //Pertenecen a la UASLP
            }
            else
            {
                //crear hash de contraseña
                $cropped_data ['password'] = Hash::make($cropped_data ['password'] ?? null);

                //Encuentra al ultimo usuari externo agregado incluso en soft deletes
                $last_user = User::withTrashed()->where('type', Extern::class)->max('id');

                //Nuevo id
                $cropped_data['id'] = $last_user->id + 1;
                $cropped_data['type'] = self::USER_TYPES['EXTERNO']; //usuario externo
            }
        }catch(\Exception $e){
            return null;
        }

            # Crea al usuario.
            $user = User::create($cropped_data);
            $user->id = $cropped_data['id'];
            $user->makeHidden(['invoice_data','invoice_url','lunch','paid','paid_at']);


        return $user;
    }


    /**
     * Creates a new user. This method is only available for
     * sub-systems
     *
     * @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {
        # Genera al usuario
        $user = $this->newUser($request->validated());

        return new JsonResponse($user, JsonResponse::HTTP_CREATED);
    }

    /**
     * Creates a new user. This method is only available for
     * sub-systems
     *
     * @param StoreUserRequest $request
     */
    public function storeMany(StoreUsersRequest $request)
    {
        # Datos de la solicitud
        $users = $request->users;
        $new_users = [];

        # Arreglo con nuevos usuarios.
        foreach ($users as $user)
            $new_users[] = $this->newUser($user);


        return new JsonResponse($new_users, JsonResponse::HTTP_CREATED);
    }


    /**
     * Retrieves an array of users with basic information
     *  @var string
     */
    public function index(Request $request)
    {
        $hidden = [
            'invoice_data','invoice_url','lunch','paid','paid_at',
            'courses','comments','interested_on_further_courses', 'domain'
        ];

        # Obtiene los tipos de usuario.
        $users = QueryBuilder::for(User::class)
            ->setEagerLoads([])
            ->allowedFields(['id','type','name','middlename','surname','email','curp'])
            ->allowedIncludes(['userModules'])
            ->allowedFilters([
                AllowedFilter::exact('userModules.id'),
                AllowedFilter::exact('id'),
                AllowedFilter::exact('type'),
                AllowedFilter::exact('email'),
                AllowedFilter::exact('curp'),
            ])
            ->get()->makeHidden($hidden);

        return new JsonResponse($users, JsonResponse::HTTP_OK);
    }

    /**
     * Set a new module relation to a user
     *
     * @var string
     */

    public function updateModuleUser(Request $request)
    {
        try{
            $request->validate([
                'id' => ['required', 'numeric'],
                'module_id' => ['required', 'numeric'],
            ]);
        }catch(\Exception $e){
            return new JsonResponse(['message'=>"Request invalido"], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            $user = User::where('id',$request->id)->first();
            DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$request->module_id, $user->id, $user->type]);
        }catch(\Exception $e){
            return new JsonResponse(['message'=>"El usuario ya ha sido creado",'user_id'=>$user->id], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse(['message'=>"Modulo actualizado"], JsonResponse::HTTP_CREATED);

    }


    /**
     * Retrieves
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

        Mail::to($user)->send(new RegisteredTo17Gemas);
        return response()->json([ 'message' => 'cool' ], JsonResponse::HTTP_OK);
    }



    /**
     * Retrieves an user.
     *
     * @param string $user_type
     * @param int $user_id
     * @return User
     */
    public function show($user_type, $user_id)
    {
        # Recupera al usuario.
        $user = User::without(['roles','workshops','userModules','unirodadasUser'])
            ->where('id', $user_id)
            ->where('type', User::USER_TYPES[$user_type] ?? 'null')
            ->first();

        # El usuario no fue encontrado.
        if ($user === null)
            return new JsonResponse($user, JsonResponse::HTTP_NOT_FOUND);

        # Oculta atributos que no se requieren en otros sistemas.
        $user->makeHidden([
            'invoice_data','invoice_url','lunch','paid',
            'paid_at','interested_on_further_courses','courses',
            'comments','age', 'type'
        ]);

        return new JsonResponse($user, JsonResponse::HTTP_OK);
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




    //StoreUserRequest es simplemente una clase que extiende de la clase request
    public function RegisterExternalUser(Request $request)
    {
        //Usuario a retornar
        $user = null;

        // Data validation from portal
        // try{
        //     $val = Validator::make($request->all(),[
        //         'module_id' => ['required', 'exists:modules,id'],
        //         'tipo_usuario' => ['required', 'string', 'max:255'],
        //         'pertenece_uaslp' => ['required', 'boolean'],
        //         'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'numeric'],
        //         'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'in:ALUMNOS,UASLP', 'string'],
        //         'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users,email' ],
        //         'altern_email' => [ 'required', 'different:email', 'string', 'email', 'max:255' ],
        //         'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'string', 'max:255'],
        //         'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'same:password','string', 'max:255'],
        //         'no_curp' => ['required', 'boolean'],
        //         'curp' => ['nullable', 'required_if:no_curp,false',  'size:18', $this->curp_pattern,],
        //         'name' => ['required', 'string', 'max:255' ],
        //         'middlename' => ['required','string','max:255'],
        //         'surname' => ['nullable'],
        //         'birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
        //         'ocupation' => ['required', 'string', 'max:255'],
        //         'gender' => [ 'required', 'string'],
        //         'other_gender' => ['nullable','required_if:gender,Otro'],
        //         'nationality' => ['required','string','max:255'],
        //         'civic_state' => ['required', 'string'],
        //         'other_civic_state' => ['nullable', 'required_if:civic_state,Otro'],
        //         'birth_country' => ['required', 'string', 'max:255'],
        //         'birth_state' => ['required', 'string', 'max:255'],
        //         'residence_country' => ['required', 'string', 'max:255'],
        //         'residence_state' => ['required', 'string', 'max:255'],
        //         'zip_code' => ['required', 'numeric'],
        //         'phone_number' => ['required','numeric'],
        //         'is_disabled' => ['required', 'boolean'],
        //         'ethnicity' => ['nullable','string','max:255'],
        //         'disability' => ['nullable','required_if:is_disabled,true']
        //     ]);

        //     // Return data validation
        //     if ($val->fails()) {
        //         return new JsonResponse(['message'=>'Datos no validos', 'errors'=>$val->errors()], JsonResponse::HTTP_BAD_REQUEST);
        //     }

        // }catch(\Exception $e){
        //     return new JsonResponse(['message'=>"Error al mandar los datos, verifique",'error'=>$e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        // }

        //Existe o no en portal
        if($request->tipo_usuario == "Comunidad UASLP" || $request->tipo_usuario == "Ninguno"){
            $residence = $request->residence_country;
            if ($request->pertenece_uaslp === true){ //Comunidad AA o Comunidad UASLP
                $data = $request->except([
                    'module_id',
                    'no_curp',
                    'civic_state',
                    'other_civic_state',
                    'birth_state',
                    'birth_country','residence_country',
                    'tipo_usuario',
                ]);


            }else{
                $data = $request->except([
                    'module_id', 'no_curp',
                    'civic_state',
                    'other_civic_state',
                    'birth_state',
                    'birth_country','residence_country',
                    'tipo_usuario',
                ]);
            }

            $data['residence'] = $residence;
            $user = $this->newUser($data);
        }else{

            //Get user form portal
            try{
                $user = User::where('email',$request->email)->first();//saca el usuario que ya esta en el portal

                //Actualizar datos que vienen de control escolar
                $user->birth_date = $request->birth_date ?? $request->birth_date;
                $user->altern_email = $request->altern_email ?? $request->altern_email;

                //save the model and save in to data base
                $user->update(); // update the model
            }catch(\Exception $e){
                // respuesta mala return null
                return new JsonResponse(['message'=>"El usuario no se pudo obtener o actualizar de la base de datos",'user_id'=>null], JsonResponse::HTTP_CREATED);
            }

        }
        //El modelo de usuario no se creo
        if($user === null){return new JsonResponse(['message'=>"Hubo un problema al crear usuario en portal, verifique nuevamente los datos e insercional",'user_id'=>$user], JsonResponse::HTTP_CREATED);}
        try{
            DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$request->module_id, $user->id, $user->type]);
        }catch(\Exception $e){
            return new JsonResponse(['message'=>"El usuario ya ha sido creado",'user_id'=>$user->id], JsonResponse::HTTP_CREATED);
        }

        return new JsonResponse(['message'=>"¡Usuario Creado! y/o modulo actualizado",'user_id'=>$user->id], JsonResponse::HTTP_CREATED);
    }
}
