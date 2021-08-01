<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerificationEmail;
use App\Models\Auth\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Module $module, Request $request)
    {
        /** @var User */
        $user = Auth::guard('students')->user() 
             ?? Auth::guard('workers')->user() 
             ?? Auth::guard('web')->user();

        # Añade el módulo al usuario, si no pertenece a él.
        if (!$user->hasModule($module->name))
        { 
            $user->attachModule($module);
            SendVerificationEmail::dispatch($user, $module);
        }

        return redirect()->route('Panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
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

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }
}
