<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('auth.Dashbord.index')
            ->with('Modulos', $request->user()->userModules)
            ->with('user_workshops', Auth::user()->workshops);
    }

    public function Administracion(){

        # Obtiene todos los tipos de usuarios, que no sean
        # administradores.
        $students = Student::whereHas('roles', function($query) {
            return $query
                    ->whereNotIn('name', [ 'administrator' ])
                    ->where('guard_name', 'students');
        })->get();

        $workers = Worker::whereHas('roles', function($query) {
            return $query->whereNotIn('name', [ 'administrator' ])
                        ->where('guard_name', 'workers');
        })->get();

        $externs = Extern::whereHas('roles', function($query) {
            return $query->whereNotIn('name', [ 'administrator' ])
                        ->where('guard_name', 'externs');
        })->get();


        # Combina todos los tipos de usuario, ejemplo:
        #
        # [0] -> Externo,
        # [1] -> Estudiante,
        # [2] -> Trabajador,
        #
        # etc, etc.
        $users = $students->merge($workers)->merge($externs);

        return view('auth.Dashbord.Administracion')->with('users', $users)
            ->with('Modulos',Auth::user()->userModules);
    }

}
