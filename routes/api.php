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
    Route::get('/', 'UserController@show')->name('showUser');

    # Obtener usuario autenticado.
    Route::get('/whoami', 'UserController@whoAmI')->name('whoami');

    # Búsqueda de usuario.
    Route::get('/search', 'UserController@search')->name('search');
});



# Registra a un usuario, desde un sub-sistema.
Route::get('/users/{user_type}/{user_id}', 'UserController@show')->name('users.show');



# Rutas para los sub-sistemas.
Route::middleware('client')->group(function(){

    # Registro / recuperación de usuarios. 
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::post('/users', 'UserController@store')->name('users.store');
    //Route::get('/users/{user_type}/{user_id}', 'UserController@show')->name('users.show');







    
    
    # Registra a un usuario desde una aplicación cliente.
    Route::post('/registra', 'Auth\RegisterController@register');

    # Módulos de usuario.
    Route::resource('modules.users', 'UserModuleController')->only([ 'store', 'index']);

    # Obtener usuario.
    Route::get('/searchuser', 'UserController@search')->name('search');

    # Actualiza los datos del usuario especificado.
    Route::post('/updateUserData', 'UserController@updateUserData')->name('updateUserData');
});
