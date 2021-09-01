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

# Usuarios autenticados.
Route::middleware('auth:api,students-api,workers-api')->prefix('users')->name('users.')->group(function(){

    # Obtener usuario.
    Route::get('/', 'UserController@show')->name('show');

    # Obtener usuario autenticado.
    Route::get('/whoami', 'UserController@whoAmI')->name('whoami');

    # Búsqueda de usuario.
    Route::get('/search', 'UserController@search')->name('search');    
});


# Aplicaciones cliente.
Route::middleware('client')->group(function(){

    # Registra a un usuario desde una aplicación cliente.
    Route::post('/register', 'Auth\RegisterController@register');

    # Módulos de usuario.
    Route::resource('modules.users', 'UserModuleController')->only([ 'store', 'index']);

    # Obtener usuario.
    Route::get('/searchuser', 'UserController@search')->name('search');

    # Actualiza los datos del usuario especificado.
    Route::get('/updateUserData', 'UserController@updateUserData')->name('updateUserData');
});
