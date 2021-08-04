<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerificationEmail;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserModuleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Module $module, Request $request)
    {
        # Usuario autenticado
        $user = User::authUser();

        # Añade el módulo al usuario, si no pertenece a él.
        if (!$user->hasModule($module->name))
        { 
            $user->attachModule($module);
            SendVerificationEmail::dispatch($user, $module);

            return response('Successful', 200);
        }

        return response('User already registered', 422);
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
