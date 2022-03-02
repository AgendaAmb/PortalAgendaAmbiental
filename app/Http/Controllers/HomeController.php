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

        if($user->hasRole('helper')){
            $users = $this->getUnihuertoAndHuertoMesaUsers();# Usuarios de unihuerto
        }else if($user->hasRole('coordinator')){
            $users = $this->getGestionAmbientalUsers(); # Usuarios con workshops vigentes
        }else{//en dado caso es administrador
            $users = $this->getAllUsers(); # Todos los usuarios.
        }


        return view('auth.Dashbord.Administracion',[
            'users' =>  $users,
            'Modulos' => Auth::user()->userModules,
        ]);
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
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function($query){
                return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function($query){
                return $query->where('workshops.id',9); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function($q){
                return $q->where('workshops.id',9); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        
        //dd($res);
        return $res;
    }

    private function getUnihuertoAndHuertoMesaUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function($query){
                return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function($query){
                return $query
                ->whereIn('workshops.id',[9,11]); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function($q){
                return $q->whereIn('workshops.id',[9,11]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        
        //dd($res);
        return $res;
    }

    private function getWithPayUsers()//Aun no correcta!!
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function($query){
                return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function($query){
                return $query->where('workshops.id',9); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function($q){
                return $q->where('workshops.id',9); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        
        //dd($res);
        return $res;
    }

    private function getGestionAmbientalUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function($query){
                return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function($query){
                return $query->where('workshops.work_edge',2); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function($q){
                return $q->where('workshops.work_edge',2); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        
        //dd($res);
        return $res;
    }

    private function getUsersCurrentWorkshop()
    {
       # Consulta bien mortal para traer todo lo que se pide.
       $res = User::select(User::COLUMNS)
            /*
            ->whereDoesntHave('roles', function($query){
                return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            */
            //->whereDate('',>=,)
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->get();
   
        //dd($res);
        return $res;
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
        Mail::to("a278737@alumnos.uaslp.mx")->send(new PruebaMail('Hola'));
        //Mail::mailer('smtp_unihuerto')->to("a278737@alumnos.uaslp.mx")->send(new PruebaMail);
        return "si se envio el mail";
    }

    //Funciones Extras
    public function PreloginControlEscolar(Request $r){
        //return env("CONTROL_ESCOLAR_ACCESS_KEY");
        //return "s";
        $ak = env("CONTROL_ESCOLAR_ACCESS_KEY")!="" ? env("CONTROL_ESCOLAR_ACCESS_KEY") : "" ;
        return redirect("http://127.0.0.1:8080/controlescolar/auth/".$r->user_id . "?ak=" . $ak);
            //->with("user_id",$r->user_id)
            //->with("ak",env("CONTROL_ESCOLAR_ACCESS_KEY"));
    }
}
