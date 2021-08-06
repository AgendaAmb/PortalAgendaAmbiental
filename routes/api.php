<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

# Usuarios autenticados, vía API
Route::middleware('client')->group(function(){

    # Usuario autenticado
    Route::get('/user', 'UserController@user');

    # Módulo de usuario.
    Route::resource('modules.users', 'UserModuleController')->only('store');
});