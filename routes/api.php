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

    # Obtener usuario autenticado.
    Route::get('/whoami', 'UserController@whoAmI')->name('whoami'); 

    # Búsqueda de usuario.
    Route::get('/search', 'UserController@search')->name('search'); // <--- Verificar si está siendo utilizada.
});

# Rutas para los sub-sistemas.
Route::middleware('client')->prefix('usuarios')->name('usuarios.')->group(function(){

    # Registro / recuperación de usuarios.
    Route::get('/', 'UserController@index')->name('index');
    Route::post('/', 'UserController@store')->name('store');

    # Registro / Recuperación de módulos de usuario.
    Route::get('modulos', 'UserModuleController@index')->name('modulos.index');
    Route::post('modulos', 'UserModuleController@nuevo')->name('modulos.nuevo');
});

# Rutas exclusiva de 17 Gemas. Por ahora están así para que no truene, pero van arriba >:v
Route::middleware('client')->group(function(){

    # Módulos de usuario.
    Route::resource('modules.users', 'UserModuleController')->only([ 'store', 'index']);

    # Obtener usuario.
    Route::get('/searchuser', 'UserController@search')->name('search');

    # Actualiza los datos del usuario especificado.
    Route::post('/updateUserData', 'UserController@updateUserData')->name('updateUserData');
});
