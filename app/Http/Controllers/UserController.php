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
        # Asigna el id al usuario.
        if ($data['pertenece_uaslp'] === true)
        {
            $data['id'] = $data['clave_uaslp'];
            $data['type'] = self::USER_TYPES[$data['directorio_activo']];
        }
        else
        {
            $data['id'] = User::withTrashed()->where('type', Extern::class)->latest()->value('id') + 1 ?? 1;
            $data['type'] = self::USER_TYPES['EXTERNO'];
        }

        Log::info('Datos del nuevo usuario', json_encode($data, JSON_PRETTY_PRINT));
        
        $cropped_data = collect($data)->except(
            'module_id', 'pertenece_uaslp', 'clave_uaslp',
            'directorio_activo','password','rpassword',
            'other_gender','is_disabled'
        )->toArray();

        # Crea al usuario.
        $user = User::create($cropped_data);
        $user->id = $data['id'];
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
     * Retrieves a list of users.
     */
    public function index(Request $request)
    {
        # Atributos que no se devuelven.
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

        Mail::to($user)->send(new RegisteredTo17Gemas);
        return response()->json([ 'message' => 'cool' ], JsonResponse::HTTP_OK);
    }
}
