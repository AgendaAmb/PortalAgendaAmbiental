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

Auth::routes();

<<<<<<< HEAD
/*Rutas para usuarios registrados en el sistema* */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/panel', 'HomeController@panel')->name('panel');
Route::get('/Administracion', 'HomeController@Administracion')->name('Administracion');
Route::post('/Prueba', 'HomeController@Prueba')->name('Prueba');
=======
# Usuarios autenticados y con roles
Route::middleware([ 'auth:web,workers,students', 'role_any'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/panel', 'HomeController@panel')->name('panel');
    Route::get('/Administracion', 'HomeController@Administracion')->middleware('role:administrator')->name('Administracion');
    Route::post('/Prueba', 'HomeController@Prueba')->name('Prueba');

});

>>>>>>> 14067a927f8df1f389ce190d8e3462bf3a404727



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
