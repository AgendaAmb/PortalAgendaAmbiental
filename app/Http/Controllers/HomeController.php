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
    public function Administracion(){

        if (Auth::user()->hasRole('helper')) {

           # Usuarios exclusivos de la unirodada
           $users = $this->getUnirodadaUsers();


        } else {

            # Usuarios exclusivos de la unirodada
            $users = $this->getAllUsers();
        }

        # Obtiene todos los tipos de usuarios
        # Obtiene el id de los administradores y coordinadores


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
        $admins = Student::role('administrator')->pluck('id');
        $students = Student::whereNotIn('id', $admins)->get();
        $coordinators = Student::role('coordinator')->pluck('id');

        # Obtiene todos los estudiantes que no son admins y coordinadores
        $students = Student::whereNotIn('id', $admins)
            ->whereNotIn('id', $coordinators)
            ->whereHas('workshops', function($query){

                $query->where('type', 'unirodada');
            })->get();

        # Obtiene el id de los administradores y coordinadores
        $admins = Worker::role('administrator')->pluck('id');
        $workers = Worker::whereNotIn('id', $admins)->get();
        $coordinators = Worker::role('coordinator')->pluck('id');


        # Obtiene todos los trabajadores que no son admins y coordinadores
        $workers = Worker::whereNotIn('id', $admins)
                ->whereNotIn('id', $coordinators)
                ->whereHas('workshops', function($query){

                    $query->where('type', 'unirodada');
                })->get();

        # Obtiene a todos los usuarios externos.
        $externs = Extern::whereHas('workshops', function($query){

            $query->where('type', 'unirodada');
        })->get();

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
        $admins = Student::role('administrator')->whereNotIn('id', [262698])->pluck('id');
        $students = Student::whereNotIn('id', $admins)->get();
        $coordinators = Student::role('coordinator')->pluck('id');

        # Obtiene todos los estudiantes que no son admins y coordinadores
        $students = Student::whereNotIn('id', $admins)
                ->whereNotIn('id', $coordinators)
                ->get();

        # Obtiene el id de los administradores y coordinadores
        $admins = Worker::role('administrator')->pluck('id');
        $workers = Worker::whereNotIn('id', $admins)->get();
        $coordinators = Worker::role('coordinator')->pluck('id');

        # Obtiene todos los trabajadores que no son admins y coordinadores
        $workers = Worker::whereNotIn('id', $admins)
                ->whereNotIn('id', $coordinators)
                ->get();

        # Obtiene a todos los usuarios externos.
        $externs = Extern::all();


        # Combina todos los tipos de usuario.
        return $students->merge($workers)->merge($externs)->sortBy('created_at');
    }

}
