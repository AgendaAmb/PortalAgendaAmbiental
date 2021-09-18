<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserModuleRequest;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;

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
        return $module->users();
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

    /**
     * Update the specified resource in storage.
     *
     * @param string $module,
     * @param string $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail($module, $user)
    {
        /** @var Module */
        $decrypted_module = Crypt::decrypt($module);
        
        /** @var User */
        $decrypted_user = Crypt::decrypt($user);

        # Verifica el email del usuario en el módulo.
        $decrypted_user->verifyEmailOn($decrypted_module);


        return redirect()->route('login');
    }
}
