<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Introduccion.vista');
})->name('Index');

Route::get('/gestión', function () {
    return view('Gestion.vista');
})->name('Gestion');

Route::get('/educación', function () {
    return view('Educacion.vista');
})->name('Educacion');

Route::get('/vinculación', function () {
    return view('Vinculacion.vista');
})->name('Vinculacion');

Route::get('/comunicación', function () {
    return view('Comunicacion.vista');
})->name('Comunicacion');

Route::get('/Nosotros/{id?}', function ($id=null) {
    return view('Nosotros.Contenido')->with('id',$id);
})->name('Nosotros');

Route::get('/Unibici', function () {
    return view('Unibici.contenido');
})->name('Unibici');

Route::get('/Unihuerto/{nombreModal?}', function ($NombreM=null) {
    return view('Unihuerto.contenido')->with('NombreM',$NombreM);
})->name('Unihuerto');

Route::get('/FotografiaPorLaSostenibilidad', function () {
    return view('FotografiaSostenibilidad.contenido');
})->name('FotografiaS');

Route::get('/Cineminuto', function () {
    return view('Cineminuto.contenido');
})->name('Cineminuto');

Route::get('/Proserem/{nombreModal?}', function ($NombreM=null) {
    return view('Proserem.contenido')->with('NombreM',$NombreM);
})->name('Proserem');

Route::get('/DateUnRespiro', function () {
    return view('DateUnRespiro.contenido');
})->name('DateUnRespiro');

Route::get('/ConsumoResponsable/{nombreModal?}', function ($NombreM=null) {
    return view('ConsumoResponsable.contenido')->with('NombreM',$NombreM);;
})->name('ConsumoResponsable');

Route::get('/MovilidadUrbanaSostenible', function () {
    return view('mmus.contenido');
})->name('mmus');

Route::get('/CicloDeConferencias', function () {
    return view('Conferencias.contenido');
})->name('CicloConf');

Auth::routes(['verify' => true]);

# Usuarios autenticados y con roles
Route::middleware([ 'auth:web,workers,students', 'verified', 'role_any'])->group(function(){
    Route::get('/panel', 'HomeController@panel')->name('panel');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/Administracion', 'HomeController@Administracion')->middleware('role:administrator')->name('Administracion');
    Route::post('/Prueba', 'HomeController@Prueba')->name('Prueba');
    
    # Módulos de usuario
    Route::get('/modules/{module}/verify-email/{user}', 'UserModuleController@verifyEmail')->name('modules.user.verify-email');
    Route::resource('modules', ModuleController::class);
});


# Expedición de tokens y autorización por parte del 
# sistema central.
Route::prefix('oauth')->name('passport.')->middleware('auth:web,workers,students')->group(function(){

    # Autorizar acceso a aplicación cliente.
    Route::get('/authorize', '\Laravel\Passport\Http\Controllers\AuthorizationController@authorize')->name('authorizations.authorize');
    Route::post('/authorize', '\Laravel\Passport\Http\Controllers\ApproveAuthorizationController@approve')->name('authorizations.approve');

    # Token bearer para aplicación cliente.
    Route::post('/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->name('token')->middleware('throttle')
        ->withoutMiddleware('auth:web,workers,students');
});



/*Rutas para redireccion de rutas anteriores de agenda ambiental */
Route::redirect('/historia/index.html', '/Nosotros', 301);
Route::redirect('/consumoresp/index.html', '/ConsumoResponsable', 301);
Route::redirect('/proserem/index.html', '/Proserem', 301);
Route::redirect('/unihuerto-2/index.html', '/Unihuerto', 301);
Route::redirect('/comunicaciones/index.html', '/comunicación', 301);
Route::redirect('/unibici/index.html', '/Unibici', 301);
Route::redirect('/cineminuto/index.html', '/Cineminuto', 301);
Route::redirect('/vinculacion/index.html', '/vinculación', 301);
Route::redirect('/daterespiro/index.html', '/DateUnRespiro', 301);
Route::redirect('/gestion-2/index.html', '/gestión', 301);
Route::redirect('/mmus/index.html', '/MovilidadUrbanaSostenible', 301);
