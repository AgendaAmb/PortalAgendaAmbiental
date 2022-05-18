<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserModuleRequest;
use App\Http\Requests\StoreUsersModuleRequest;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        # Recupera el tipo de clase del usuario.
        $type = User::USER_TYPES[$data['user_type']];

        # Recupera al usuario.
        $user = User::where('id', $data['user_id'])->where('type', $type)->first();

        # No agrega el módulo de usuario.
        if ($user === null)
            return false;

        # Recupera el módulo de usuario
        $has_module = $user->userModules()->where('modules.id', $data['module_id'])->count() > 0;

        # No agrega el módulo de usuario.
        if ($has_module === true)
            return false;

        # Se agrega el módulo.
        $user->userModules()->attach($data['module_id'],['user_type' => $type]);

        # El módulo fue agregado.
        return true;
    }

    public function deleteUserModule(array $data)
    {
         # Recupera el tipo de clase del usuario.
         $type = User::USER_TYPES[$data['user_type']];

         # Recupera al usuario.
         $user = User::where('id', $data['user_id'])->first();

         # No agrega el módulo de usuario.
         if ($user === null)
             return false;

         # Recupera el módulo de usuario
         $has_module = $user->userModules()->where('modules.id', $data['module_id'])->count() > 0;

         # No agrega el módulo de usuario.
         if ($has_module === false)
             return false;

         # Se agrega el módulo.
         $user->userModules()->detach($data['module_id']);

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
    public function nuevo(Request $request)
    {
        # Devuelve el resultado de agregar el módulo.
        // if ($this->newUserModule($request->validated()) === false)
            // return new JsonResponse([
            //     'message' => 'User already registered'
            // ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        try{
            $request->validate([
                'module_id' => ['required','numeric','exists:modules,id'],
                'user_id' => [ 'required','numeric','exists:users,id' ],
                'user_type' => [ 'required', 'in:externs,students,workers']
            ]);

            # Recupera el tipo de clase del usuario.
            $type = User::USER_TYPES_CE[$request->user_type];
            # Recupera al usuario.
            $user = User::where('id', $request->user_id)->first();
            DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$request->module_id, $user->id, $type]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => 'User already registered'
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        }

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

    //Nuevas funciones
    public function RegisterExternalUser(){

    }

    public function deleteModulo(Request $request )
    {
        // DELETE FROM table_name WHERE condition;

         # Devuelve el resultado de agregar el módulo.
        //  if ($this->deleteUserModule($request->validated()) === false)

        try{
            $request->validate([
                'module_id' => ['required','numeric','exists:modules,id'],
                'user_id' => [ 'required','numeric','exists:users,id' ],
                'user_type' => [ 'required', 'in:externs,students,workers']
            ]);

            # Recupera el tipo de clase del usuario.
            $type = User::USER_TYPES_CE[$request->user_type];
            # Recupera al usuario.
            $user = User::where('id', $request->user_id)->first();

            DB::table('module_user')->where('module_id',$request->module_id)->where('user_id',$user->id)->delete();
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => 'No se puso eliminar modulo a usuario'
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

     return new JsonResponse(['message' => 'Usuario Eliminado'], JsonResponse::HTTP_OK);

    }
}
