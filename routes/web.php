<?php

use App\Mail\EmailLayout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// ROUTE TO TEST CONECTION WITH FINANCES SERVICE
Route::get('/soap_finances', 'TestingController@test')->name('test_soap');

Route::view('/', 'Introduccion.vista', ['NombreM' => null])->name('Index');

Route::view('/Concurso17gemas', '17Gemas.contenido', ['NombreM' => null])->name('Gemas');

Route::get('/gestión/{nombreModal?}', function ($NombreM = null) {
    return view('Gestion.vista')->with('NombreM', $NombreM);
})->name('Gestion');

Route::get('/GGJ2022/{nombreModal?}', function ($NombreM = null) {
    return view('GlobalGoalsJam2022.contenido')->with('NombreM', $NombreM);
})->name('GlobalGoalsJam2022');

Route::get('/educación/{nombreModal?}', function ($NombreM = null) {
    return view('Educacion.vista')->with('NombreM', $NombreM);
})->name('Educacion');

Route::get('/vinculación', function () {
    return view('Vinculacion.vista');
})->name('Vinculacion');

Route::get('/CompetenciasProfesionales', function () {
    return view('Introduccion.vista')->with('NombreM', 'CompetenciasProfesionales');
})->name('CompetenciasProfesionales');

Route::get('/comunicación', function () {
    return view('Comunicacion.vista');
})->name('Comunicacion');

Route::get('/Nosotros/{id?}', function ($id = null) {
    return view('Nosotros.Contenido')->with('id', $id);
})->name('Nosotros');

Route::get('/Unibici/{nombreModal?}', function ($NombreM = null) {
    return view('Unibici.contenido')->with('NombreM', $NombreM);
})->name('Unibici');

Route::get('/Cursos', function () {
    return view('Cursos.contenido');
})->name('Cursos');

Route::get('/Cursos2023', function () {
    return view('Cursos2023.contenido');
})->name('Cursos2023');

Route::get('/Uniruta/{nombreModal?}', function ($NombreM = null) {
    return view('Uniruta.contenido')->with('NombreM', $NombreM);
})->name('Uniruta');

Route::get('/Unihuerto/{nombreModal?}', function ($NombreM = null) {
    return view('Unihuerto.contenido')->with('NombreM', $NombreM);
})->name('Unihuerto');

Route::get('/FotografiaPorLaSostenibilidad', function () {
    return view('FotografiaSostenibilidad.contenido');
})->name('FotografiaS');

Route::get('/Cineminuto', function () {
    return view('Cineminuto.contenido');
})->name('Cineminuto');

Route::get('/Proserem/{nombreModal?}', function ($NombreM = null) {
    return view('Proserem.contenido')->with('NombreM', $NombreM);
})->name('Proserem');

Route::get('/DateUnRespiro', function () {
    return view('DateUnRespiro.contenido');
})->name('DateUnRespiro');

Route::get('/CicloConferencias', function () {
    return view('Conferencias.contenido');
})->name('CicloConf');

Route::get('/ConsumoResponsable/{nombreModal?}', function ($NombreM = null) {
    return view('ConsumoResponsable.contenido')->with('NombreM', $NombreM);
})->name('ConsumoResponsable');

Route::get('/MovilidadUrbanaSostenible', function () {
    return view('mmus.contenido');
})->name('mmus');

Route::get('/MovilidadUrbanaSostenible2021/{nombreModal?}', function ($NombreM = null) {
    return view('mmus2021.contenido')->with('NombreM', $NombreM);
})->name('mmus2021');

Route::get('/Unihuerto/{nombreModal?}', function ($NombreM = null) {
    return view('Unihuerto.contenido')->with('NombreM', $NombreM);
})->name('Unihuerto');

Route::get('/mmus2022/{nombreModal?}', function ($NombreM = null) {
    return view('mmus2022.contenido')->with('NombreM', $NombreM);
})->name('mmus2022');

Route::get('/Bienvenida/{nombreModal?}', function (Request $request, $NombreM = null) {
    $request->session()->put('NombreM', $NombreM);
    return view('auth.Bienvenida')->with('NombreM', $NombreM);
})->middleware(['guest:web', 'guest:students', 'guest:workers'])
    ->name('Bienvenida');


Route::get('/pruebacorreo', 'HomeController@pruebacorreo');

# Rutas de autenticación.
Auth::routes(['verify' => true]);

# Usuarios autenticados y con roles
Route::middleware(['auth:web,workers,students', 'verified', 'role_any'])->group(function () {
    Route::get('/Miportal2', 'HomeController@panel')->name('panel2');

    Route::get('/Miportal', 'HomeController@panel2')->name('panel');

    Route::middleware(['auth'])->group(function () {
        // Ruta de registro 20 aniversario
        Route::get('/Miportal/20Aniversario/register', 'AnniversaryController@register')->name('20register');
        // Ruta home de 20 aniversario
        Route::get('/Miportal/20Aniversario/', 'AnniversaryController@home')->name('20home');
        // Ruta admin 20 aniversario
        Route::get('/Miportal/20Aniversario/admin', 'AnniversaryController@admin')->name('20admin');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/Administracion', 'HomeController@Administracion')->middleware('role:administrator|coordinator|helper')->name('Administracion');
    Route::post('/Prueba', 'HomeController@Prueba')->name('Prueba');
    Route::post('/GetWorkshops', 'WorkshopController@GetWorkshops');

    Route::post('PreloginControlEscolar', 'HomeController@PreloginControlEscolar')->name('PreloginControlEscolar');

    # Módulos de usuario
    Route::resource('modules', ModuleController::class);

    # Registro a eventos.
    Route::post('/RegistrarTallerUsuario', 'WorkshopController@store')->name('RegistrarTallerUsuario');
    Route::get('/Talleres', 'WorkshopController@index')->name('Talleres');

    # Registro a unihuertocasa feb - marzo 2022.
    Route::post('/RegistrarUnihuertoCasaUsuario', 'WorkshopController@RegistrarUnihuertoCasaUsuario')->name('RegistrarUnihuertoCasaUsuario');
    Route::post('/ChecarUnihuertoCasaUsuario', 'WorkshopController@ChecarUnihuertoCasaUsuario')->name('ChecarUnihuertoCasaUsuario');

    # Registro a slow Fashion 2023.
    Route::post('/RegistrarslowFashionUsuario', 'WorkshopController@RegistrarslowFashionUsuario')->name('RegistrarslowFashionUsuario');
    Route::post('/ChecarslowFashionUsuario', 'WorkshopController@ChecarslowFashionUsuario')->name('ChecarslowFashionUsuario');

    # Registro a Promotores Ambientales 2023.
    Route::post('/RegistrarPromotores', 'WorkshopController@RegistrarPromotores')->name('RegistrarPromotores');
    Route::post('/ChecarPromotores', 'WorkshopController@ChecarPromotores')->name('ChecarslowFashionUsuario');


    # Registro a unitrueque.
    Route::post('/RegistrarUnitruequeUsuario', 'WorkshopController@RegistrarUnitruequeUsuario')->name('RegistrarUnitruequeUsuario');
    Route::post('/ChecarUnitruequeUsuario', 'WorkshopController@ChecarUnitruequeUsuario')->name('ChecarUnitruequeUsuario');

    # Registro a huerto a la mesa.
    Route::post('/RegistrarHuertoMesaUsuario', 'WorkshopController@RegistrarHuertoMesaUsuario')->name('RegistrarHuertoMesaUsuario');
    Route::post('/ChecarHuertoMesaUsuario', 'WorkshopController@ChecarHuertoMesaUsuario')->name('ChecarHuertoMesaUsuario');

    # Registro a huerto a la mesa huasteca.
    Route::post('/RegistrarHuertoMesaHuastecaUsuario', 'WorkshopController@RegistrarHuertoMesaHuastecaUsuario')->name('RegistrarHuertoMesaHuastecaUsuario');
    Route::post('/ChecarHuertoMesaHuastecaUsuario', 'WorkshopController@ChecarHuertoMesaHuastecaUsuario')->name('ChecarHuertoMesaHuastecaUsuario');

    # Registro a Rodada por los Rios
    Route::post('/RegistrarRodadaRioUsuario', 'WorkshopController@RegistrarRodadaRioUsuario')->name('RegistrarRodadaRioUsuario');
    Route::post('/ChecarRodadaRioUsuario', 'WorkshopController@ChecarRodadaRioUsuario')->name('ChecarRodadaRioUsuario');

    # Registro a promotores huasteca.
    Route::post('/RegistrarPromotoresHuastecaUsuario', 'WorkshopController@RegistrarPromotoresHuastecaUsuario')->name('RegistrarPromotoresHuastecaUsuario');
    Route::post('/ChecarPromotoresHuastecaUsuario', 'WorkshopController@ChecarPromotoresHuastecaUsuario')->name('ChecarPromotoresHuastecaUsuario');

    # Registro a uniruta.
    Route::post('/RegistrarUnirutaUsuario', 'WorkshopController@RegistrarUnirutaUsuario')->name('RegistrarUnirutaUsuario');
    Route::post('/ChecarUnirutaUsuario', 'WorkshopController@ChecarUnirutaUsuario')->name('ChecarUnirutaUsuario');

    # Registro a cursos de actualizacioón.
    Route::post('/RegistrarCAUsuario', 'WorkshopController@RegistrarCAUsuario')->name('RegistrarCAUsuario');
    Route::post('/ChecarCAUsuario', 'WorkshopController@ChecarCAUsuario')->name('ChecarCAUsuario');

    # Registro a cursos de mmus2022.
    Route::post('/RegistrarMmus2022', 'WorkshopController@RegistrarMmus2022')->name('RegistrarMmus2022');
    Route::post('/ChecarMmus2022', 'WorkshopController@ChecarMmus2022')->name('ChecarMmus2022');

    # Registro ggj.
    Route::post('/RegistrarGGJ', 'WorkshopController@RegistrarGGJ')->name('RegistrarGGJ');
    Route::post('/ChecarGGJ', 'WorkshopController@ChecarGGJ')->name('ChecarGGJ');

    # Registro kids.
    Route::post('/RegistrarKids', 'WorkshopController@RegistrarKids')->name('RegistrarKids');
    Route::post('/ChecarKids', 'WorkshopController@ChecarKids')->name('ChecarKids');
    Route::get('/FormatoMinirodada', 'WorkshopController@FormatoMinirodada')->name('FormatoMinirodada');

    # Registro a unirodada mmus 2022
    Route::post('/RegistrarRodadaMmus', 'WorkshopController@RegistrarRodadaMmus')->name('RegistrarRodadaMmus');
    Route::post('/ChecarRodadaMmus', 'WorkshopController@ChecarRodadaMmus')->name('ChecarRodadaMmus');

    # Comptetencias Profesionales 
    Route::post('/RegistrarCompetencias', 'WorkshopController@RegistrarCompetencias')->name('RegistrarCompetencias');
    Route::post('/ChecarCompetencias', 'WorkshopController@ChecarCompetencias')->name('ChecarCompetencias');

    # Reutronic
    Route::post('/RegistrarReutronic', 'WorkshopController@RegistrarReutronic')->name('RegistrarReutronic');
    Route::post('/ChecarReutronic', 'WorkshopController@ChecarReutronic')->name('ChecarReutronic');

    // ! working 
    # Registro del usuario a eventos (se van a migrar registro de eventos a esta ruta)
    Route::post('/EgresadoData', 'HomeController@EgresadoData')->name('EgresadoData');

    # Registro del usuario a eventos (se van a migrar registro de eventos a esta ruta)
    Route::post('/WorkshopUserRegister', 'WorkshopController@WorkshopUserRegister')->name('WorkshopUserRegister');

    # Registro del usuario a eventos (se van a migrar registro de eventos a esta ruta)
    Route::post('/WorkshopUnirodadaUserRegister', 'WorkshopController@WorkshopUnirodadaUserRegister')->name('WorkshopUnirodadaUserRegister');

    // ! Workshop

    Route::get('/Talleres', 'WorkshopController@index')->name('Talleres');

    # Marcar asistencia a evento
    Route::post('/RegistraAsistencia', 'WorkshopController@markAsistence')->name('RegistraAsistencia');

    # Envía un comprobante a un usuario.
    Route::post('/EnviaFicha', 'CursosActualizacionController@sendPayForm')
        ->middleware('role:helper')
        ->name('EnviaFicha');

    # Envía un comprobante a un usuario.
    Route::post('/EnviaFactura', 'CursosActualizacionController@sendFactura')
        ->middleware('role:helper')
        ->name('EnviaFactura');

    #cambio

    # Envía un comprobante a un usuario.
    Route::post('/EnviaComprobante', 'CursosActualizacionController@sendReceipt')->name('EnviaComprobante');

    # Envía un comprobante a un usuario.
    Route::post('/cambiaStatusPago', 'CursosActualizacionController@cambiaStatusPago')->name('cambiaStatusPago');

    # Actualiza el lunch del usuario.
    Route::post('/actualizaLunchUsuario', 'UnirodadaController@actualizaLunchUsuario')->name('actualizaLunchUsuario');

    # Previsualiza el comprobante de pago.
    Route::get('/workshops/{userType}/{userId}/{fileName}', 'FileController@verComprobante')
        ->middleware('role:administrator|coordinator|helper')
        ->name('verComprobante');

    # Envía un correo electrónico.
    Route::post('/sendEmail', 'CorreosController@sendEmail');
});

# Expedición de tokens y autorización por parte del
# sistema central.
Route::prefix('oauth')->name('passport.')->middleware('auth:web,workers,students')->group(function () {

    # Autorizar acceso a aplicación cliente.
    Route::get('/authorize', '\Laravel\Passport\Http\Controllers\AuthorizationController@authorize')->name('authorizations.authorize');
    Route::post('/authorize', '\Laravel\Passport\Http\Controllers\ApproveAuthorizationController@approve')->name('authorizations.approve');

    # Token bearer para aplicación cliente.
    Route::post('/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->name('token')->middleware('throttle')
        ->withoutMiddleware('auth:web,workers,students');
});

/*

Route::get('pp',function(){
    $user = App\Models\Auth\User::where('email','a278737@alumnos.uaslp.mx')->first();
    //Illuminate\Support\Facades\DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [2, 278737,'App\Models\Auth\Student']);
    //return 'si';
    return $user;
});
*/


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
