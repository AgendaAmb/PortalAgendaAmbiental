<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserModuleRequest;
use App\Http\Requests\StoreUsersModuleRequest;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserModuleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return bool
     */
    private function newUserModule(array $data)
    {
        # Recupera al usuario.
        $user = User::where('id', $data['user_id'])->where('type', $data['user_type'])->first();

        # No agrega el módulo de usuario.
        if ($user === null)
            return false;

        # Recupera el módulo de usuario
        $has_module = $user->userModules()->where('modules.id', $data['module_id'])->count() > 0;

        # No agrega el módulo de usuario.
        if ($has_module === true)
            return false;

        # Se agrega el módulo.
        $user->userModules()->attach($data['module_id']);

        # El módulo fue agregado.
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        return new JsonResponse($module->users, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nuevo(StoreUserModuleRequest $request)
    {
        # Devuelve el resultado de agregar el módulo.
        if ($this->newUserModule($request->validated()) === false)
            return new JsonResponse([
                'message' => 'User already registered'
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        return new JsonResponse(['message' => 'Usuario registrado'], JsonResponse::HTTP_OK);
    }
    
    /**
     * Agrega a muchos usuarios a un módulo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMany(StoreUsersModuleRequest $request)
    {
        # Usuarios de la petición.
        $users = $request->users;

        # Resultados al agregar a los usuarios.
        $results = [];

        foreach ($users as $user)
            $results[] = $this->newUserModule($user);
        
        return new JsonResponse($results, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Module $module, StoreUserModuleRequest $request)
    {
        # Usuario autenticado
        $user = User::retrieveById($request->user_id, $request->user_type);

        # Añade el módulo al usuario, si no pertenece a él.
        if (!$user->hasModule($module->name))
        {
            $user->attachModule($module);
            return response('Successful', JsonResponse::HTTP_OK);
        }

        return response('User already registered', JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
