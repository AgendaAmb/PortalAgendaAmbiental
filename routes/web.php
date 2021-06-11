<?php

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
    return view('Unibici.Contenido');
})->name('Unibici');

Route::get('/Unihuerto', function () {
    return view('Unihuerto.Contenido');
})->name('Unihuerto');

Route::get('/Proserem', function () {
    return view('Proserem.contenido');
})->name('Proserem');

Route::get('/DateUnRespiro', function () {
    return view('DateUnRespiro.Contenido');
})->name('DateUnRespiro');

Route::get('/MovilidadUrbanaSostenible', function () {
    return view('mmus.Contenido');
})->name('mmus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
