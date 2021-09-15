<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }
    /*no quites esta ruta:v es para el panel y hacer pruebas, cuando esten los roles empezamos a poner rutas chidas

    */
    public function panel(Request $request){

        $nombreModal = session('nombreModal') ?? null;

        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        return view('auth.Dashbord.index')
            ->with('Modulos', $request->user()->userModules)
            ->with('user_workshops', Auth::user()->workshops)
            ->with('nombreModal', $nombreModal);
    }

    /**
     * Obtiene el listado de usuarios.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Administracion(Request $request)
    {
        $users = $request->user()->hasRole('helper')

        ?  $this->getUnirodadaUsers() # Usuarios exclusivos de la unirodada
        :  $this->getAllUsers();      # Todos los usuarios.

        # Obtiene el num de usuarios que son de la fup.
        $fup_users = DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop.id', '=', 'user_workshop_id')
            ->join('workshops', 'workshops.id', '=', 'workshop_id')
            ->where('workshops.name', 'Unirodada cicloturística a la Cañada del Lobo')
            ->where('unirodada_users.group', 'fup')
            ->count();

        # Obtiene todos los tipos de usuarios
        return view('auth.Dashbord.Administracion')->with('users', $users)
            ->with('Modulos',Auth::user()->userModules)
            ->with('fup_users', $fup_users);
    }


    /**
     * Obtiene el listado de usuarios de la unirodada.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getUnirodadaUsers()
    {
        $students = Student::whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereHas('workshops', function($query){
            $query->where('type', 'unirodada');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();

        $workers = Worker::whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereHas('workshops', function($query){
            $query->where('type', 'unirodada');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();

        $externs = Extern::whereHas('workshops', function($query){
            $query->where('type', 'unirodada');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();


        # Combina todos los tipos de usuario.
        return $students->merge($workers)->merge($externs)->sortBy('created_at');
    }

    /**
     * Obtiene todo el listado de usuarios.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getAllUsers()
    {


        $students = Student::whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();

        $workers = Worker::whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();

        $externs = Extern::whereNotNull('email_verified_at')->orderBy('created_at')->get();

        # Combina todos los tipos de usuario.

        return $students->merge($workers)->merge($externs)->sortBy('created_at');
    }

}
