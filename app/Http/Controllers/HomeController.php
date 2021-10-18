<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
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
        # Obtiene el num de usuarios que son de la fup.
        $fup_users = DB::table('unirodada_users')
            ->join('user_workshop', 'user_workshop.id', '=', 'user_workshop_id')
            ->join('workshops', 'workshops.id', '=', 'workshop_id')
            ->where('workshops.name', 'Unirodada cicloturística a la Cañada del Lobo')
            ->where('unirodada_users.group', 'fup')
            ->count();

        return view('home')
        ->with('fup_users', $fup_users);
    }
    /*no quites esta ruta:v es para el panel y hacer pruebas, cuando esten los roles empezamos a poner rutas chidas

    */
    public function panel(Request $request){

        $nombreModal = session('nombreModal') ?? null;
        $fup_users = DB::table('unirodada_users')
        ->join('user_workshop', 'user_workshop.id', '=', 'user_workshop_id')
        ->join('workshops', 'workshops.id', '=', 'workshop_id')
        ->where('workshops.name', 'Unirodada cicloturística a la Cañada del Lobo')
        ->where('unirodada_users.group', 'fup')
        ->count();
        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        return view('auth.Dashbord.index')
            ->with('Modulos', $request->user()->userModules)
            ->with('user_workshops', Auth::user()->workshops)
            ->with('nombreModal', $nombreModal)->with('fup_users', $fup_users);
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

        # Obtiene todos los tipos de usuarios


        return view('auth.Dashbord.Administracion')->with('users', $users)
            ->with('Modulos',Auth::user()->userModules);
    }

    
    /**
     * Obtiene el listado de usuarios de la unirodada.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getUnirodadaUsers()
    {
        # Combina todos los tipos de usuario.
        return User::select(
            User::COLUMNS
        )->whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereHas('workshops', function($query){
            $query->where('type', 'unirodada');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();
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
        )->whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator'])
                ->whereNotIn('users.id', [12457, 25389]);
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();
    }

}
