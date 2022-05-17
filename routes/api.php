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
Route::get('/getAllModules', 'ModuleController@getAllModules')->name('getAllModules');
Route::get('/getAllWorkshops', 'WorkshopController@getAllWorkshops')->name('getAllWorkshops');
Route::post('/registerWorkShop', 'WorkshopController@registerWorkShop')->name('registerWorkShop');

Route::post('/RegisterExternalUser','UserController@RegisterExternalUser')->name('RegisterExternalUser');
Route::post('/UpdateModuleUser','UserController@UpdateModuleUser')->name('UpdateModuleUser');

# Usuarios autenticados.
Route::middleware('auth:api,students-api,workers-api')->prefix('users')->name('users.')->group(function(){


    # Obtener usuario autenticado.
    Route::get('/whoami', 'UserController@whoAmI')->name('whoami');

    # Búsqueda de usuario.
    Route::get('/search', 'UserController@search')->name('search');

});

# Rutas para los sub-sistemas.
Route::middleware(['client'])->prefix('usuarios')->name('usuarios.')->group(function(){ //Esta es la original
// Route::prefix('usuarios')->name('usuarios.')->group(function(){

    # Registro / recuperación de usuarios.
    Route::get('/', 'UserController@index')->name('index');
    Route::post('/', 'UserController@store')->name('store');
    Route::post('/storeMany', 'UserController@storeMany')->name('storeMany');

    # Registro / Recuperación de módulos de usuario.
    Route::get('modulos', 'UserModuleController@index')->name('modulos.index');
    Route::post('modulos', 'UserModuleController@nuevo')->name('modulos.nuevo');
    Route::post('modulos/storeMany', 'UserModuleController@storeMany')->name('modulos.storeMany');
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
