<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\ejes;
use App\Mail\PruebaMail;
use App\Models\Auth\Worker;
use App\Models\UnirodadaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        # Obtiene el num de usuarios que son de la fup.
        $fup_users = DB::table('unirodada_users')->where('unirodada_users.group', 'fup')->count();

        return view('home')
        ->with('fup_users', $fup_users);
    }
    /*no quites esta ruta:v es para el panel y hacer pruebas, cuando esten los roles empezamos a poner rutas chidas

    */
    public function panel(Request $request){

        $nombreModal = session('nombreModal') ?? null;
        $fup_users = DB::table('unirodada_users')->where('unirodada_users.group', 'fup')->count();
        
        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        return view('auth.Dashbord.index')
            ->with('Modulos', $request->user()->userModules)
            ->with('user_workshops', Auth::user()->workshops)
            ->with('nombreModal', $nombreModal)->with('fup_users', $fup_users)
            ->with('Ejes',ejes::all())
            ->with('workshops',Workshop::all())
            ;
    }

    /**
     * Obtiene el listado de usuarios.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Administracion(Request $request)
    {
        $user = $request->user('workers') ?? $request->user('students') ?? $request->user();
        $users = $user->hasRole('helper')

        ?  $this->getUnihuertoUsers() # Usuarios exclusivos de la Agricultura 30 octubre
        :  $this->getAllUsers();      # Todos los usuarios.

        # Obtiene todos los tipos de usuarios
        $users = $user->hasRole('coordinator') ? $this->getUsersCurrentWorkshop() # Usuarios exclusivos de la Agricultura 30 octubre
        :  $this->getAllUsers(); # Todos los usuarios.

        return view('auth.Dashbord.Administracion')->with('users', $users)
            ->with('Modulos',Auth::user()->userModules);
    }

    
    /**
     * Obtiene el listado de usuarios de la unirodada.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getAgriculturaUsers()
    {
     
        # Combina todos los tipos de usuario.
        return User::select(
            User::COLUMNS
        )->whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereHas('workshops', function($query){
            $query->where('name', 'Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?(27 Noviembre)');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();
    }

    
    private function getUnihuertoUsers()
    {
        /*
        dd(User::
            whereNotNull('email_verified_at')
            ->whereHas('workshops', function($query){
                //dd($query);
                $query->where('workshops.id',9); //id 9 = unihuerto
            })
            ->orderBy('created_at')
            ->get()
        );
        */
/*
        $results = DB::select( DB::raw("SELECT u.*
            FROM users u
            JOIN user_workshop uw ON u.id = uw.user_id
            JOIN workshops w ON uw.workshop_id = w.id
            WHERE w.id = 9
        "));
*/
        # Combina todos los tipos de usuario.
        $res = User::with('workshops')
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function($query){
                $query->where('user_workshop.workshop_id',9);
                    return $query;
                 //id 9 = unihuerto
            })
            ->get();
        //dd($results);
        return $res;
    }

    private function getUsersCurrentWorkshop()
    {
       // $now = Carbon::now();
        //$date = Carbon::parse($now)->toDateString();
        # Combina todos los tipos de usuario.
        return User::select(
            User::COLUMNS
        )->whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', []);
        })->whereNotNull('email_verified_at')
        ->orderBy('created_at')
        ->get();
        //NOTA: en esta funcion va una query anidada que filtraba la consulta con un where sobre la relacion de user-workshops
/*
        return DB::table('user_workshop')
            ->where('workshop_id',10)
            ->whereDate('DeadLine', '>', Carbon::now())->count();
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->get();
*/
    }

    /**
     * Obtiene todo el listado de usuarios.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getAllUsers()
    {
        # Combina todos los tipos de usuario.
        return User::select(
            User::COLUMNS
        )->whereNotNull('email_verified_at')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function pruebacorreo()
    {   
        //Mail::to()
        //Mail::to("a278737@alumnos.uaslp.mx")->send(new PruebaMail);
        Mail::mailer('smtp_unihuerto')->to("a278737@alumnos.uaslp.mx")->send(new PruebaMail);
        return "si se envio el mail";
    }

}
