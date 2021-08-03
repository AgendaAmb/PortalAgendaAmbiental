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
        
    De acuerdo <--- Mickey vio esto ;v 
    */ 
    public function panel(Request $request){
        
        return view('auth.Dashbord.index')
              ->with('Modulos',Auth::user()->userModules)
              ->with('token', $request->user()->access_token);
    }

    public function Administracion(){

        # Obtiene todos los tipos de usuarios
        $students = Student::all();
        $workers = Worker::all();
        $externs = Extern::all();

        # Combina todos los tipos de usuario, ejemplo:
        # 
        # [0] -> Externo,  
        # [1] -> Estudiante, 
        # [2] -> Trabajador, 
        # 
        # etc, etc. 
        $users = $students->merge($workers)->merge($externs);
      
        return view('auth.Dashbord.Administracion')->with('users', $users)->with('Modulos',Auth::user()->userModules);
    }
    
}
