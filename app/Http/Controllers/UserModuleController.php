<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserModuleRequest;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\JsonResponse;

class UserModuleController extends Controller
{
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
        # Usuario autenticado
        $user = User::retrieveById($request->user_id, $request->user_type);
        $module = Module::findOrFail($request->module_id);

        # Añade el módulo al usuario, si no pertenece a él.
        if (!$user->hasModule($module->name))
        {
            $user->attachModule($module);
            return response('Successful', JsonResponse::HTTP_OK);
        }

        return response('User already registered', JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
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
