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

# Usuarios.
Route::middleware('auth:api,students-api,workers-api')->prefix('users')->name('users.')->group(function(){

    # Obtener usuario.
    Route::get('/', 'UserController@show')->name('show');

    # Obtener usuario autenticado.
    Route::get('/whoami', 'UserController@whoAmI')->name('whoami');

    # Búsqueda de usuario.
    Route::get('/search', 'UserController@search')->name('search');    
});


# Módulos de usuario.
Route::middleware('client')->group(function(){

    # Módulos de usuario.
    Route::resource('modules.users', 'UserModuleController')->only([ 'store', 'index']);
});
