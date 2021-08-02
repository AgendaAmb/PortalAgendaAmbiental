<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('auth:api,students-api,workers-api')->group(function(){

    # Usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    # Usuarios de un módulo
    Route::resource('modules.users', 'Api\ApiUserModuleController')->only('index');
});