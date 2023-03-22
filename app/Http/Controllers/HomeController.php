<?php

namespace App\Http\Controllers;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\ejes;
use App\Mail\PruebaMail;
use App\Models\Auth\Worker;
use App\Models\UnirodadaUser;
use App\Models\UserWorkshop;
use App\Models\GGJUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Workshop;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use App\Models\ComiteUser;
use App\Models\ReutronicUser;
use stdClass;

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
    public function panel(Request $request)
    {

        $nombreModal = session('nombreModal') ?? null;
        $fup_users = DB::table('unirodada_users')->where('unirodada_users.group', 'fup')->count();

        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        $ce_active = $request->user()->userModules->where("name", 'Control Escolar')->count() > 0 ?  true : false;

        return view('auth.Dashbord.index')
            ->with('is_ce', $ce_active)
            ->with('Modulos', $request->user()->userModules)
            ->with('user_workshops', Auth::user()->workshops)
            ->with('nombreModal', $nombreModal)->with('fup_users', $fup_users)
            ->with('Ejes', ejes::all())
            ->with('workshops', Workshop::all());
    }

    //! NEW INTERFACE 
    public function panel2(Request $request)
    {
        //* Se usa para abrir un modal dentro de mi portal directamente
        $nombreModal = session('nombreModal') ?? null;

        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        // * Discard 20 aniversary events and get only the active events
        $user_registered_whorkshops_ids = [];
        $user_unregistered_whorkshops_ids = [];
        $cursos_actualizacion_ids = [];
        $user_registered_workshops = Auth::user()->getAssociatedWorkshops->where('end_date', '>=', Carbon::now())->values()->toArray();
        // dd($user_registered_workshops);

        foreach ($user_registered_workshops as &$workshop) {
            $workshop["registered"] = True;
            array_push($user_registered_whorkshops_ids, $workshop['id']);
        }

        $user_unregistered_workshops = Workshop::where('type', '<>', '20Aniversario')->where('type', '<>', 'cursos_actualizacion')->where('end_date', '>=', Carbon::now())->whereNotIn('id', $user_registered_whorkshops_ids)->get()->values()->toArray();
        // dd($user_unregistered_workshops);
        foreach ($user_unregistered_workshops as &$workshop) {
            $workshop["registered"] = False;
            array_push($user_unregistered_whorkshops_ids, $workshop['id']);
        }
        
        $cursos_actualizacion = Workshop::where('type', '=', 'cursos_actualizacion')->where('end_date', '>=', Carbon::now())->get()->values()->toArray();
         foreach ($cursos_actualizacion as &$workshop) {
            $workshop["registered"] = false;
            array_push($cursos_actualizacion_ids, $workshop['id']);
        }
        $object_ca = (object)$cursos_actualizacion; 
    
        $active_workshops =$user_unregistered_workshops;
        
        // dd($active_workshops);
        // 

        $active_modules = Module::where('updated_at', '<=', Carbon::now())->get()->values()->toArray();

        return view('auth.Dashbord.main')
            ->with('modulos', $request->user()->userModules) //Navbar
            ->with('modules', $active_modules)
            ->with('active_workshops', $active_workshops)
            ->with('user_registered_workshops', $user_registered_workshops)
            ->with('user_unregistered_workshops', $user_unregistered_workshops)
            ->with('nombreModal', $nombreModal)
            ->with('ejes', ejes::all()) // para el proximo navbar aun sin uso
            ->with('object_ca', $object_ca)
            ->with('user', $request->user());
    }

    /**
     * Obtiene el listado de usuarios.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Administracion(Request $request)
    {
        $user = $request->user('workers') ?? $request->user('students') ?? $request->user();
        $ce_active = $request->user()->userModules->where("name", 'Control Escolar')->count() > 0 ?  true : false;

        try {
            //! Especial - Pagina para ver alumnos del GGJ
            if ($user->id == '23642') {

                $team = array();
                $ws = Workshop::where('name', 'Global Goals Jam')->first();
                $users = DB::table('ggj_users')->get()->groupBy('user_workshop_id');

                // Format the data
                foreach ($users as $key => $value) {
                    $clave = UserWorkshop::where('id', $key)->first()->user_id;
                    $us = User::where('id', $clave)->first();
                    $data = [
                        'leader' => $us->name . ' ' . $us->middlename . ' ' . $us->surname,
                        'team' => $value->values(),
                        'len' => count($value->values())
                    ];
                    array_push($team, $data);
                }

                return view('auth.Admin.admin', [
                    'is_ce' => $ce_active,
                    'teams' => $team,
                    'Modulos' => Auth::user()->userModules,
                ]);
            }
        } catch (\Exception $e) {
            return "error";
            // return new JsonResponse($e->getMessage(), JsonResponse::HTTP_OK);
        }

        if ($user->hasRole('helper')) {
            $users = $this->getHelperUsers();
            $users2 = DB::table('user_workshop')->where('workshop_id', '=', '45')->get();
            // return $users;
            return view('auth.Dashbord.Administracion', [
                'is_ce' => $ce_active,
                'users' =>  $users,
                'users2' => $users2,
                'Modulos' => Auth::user()->userModules,
            ]);
        } else if ($user->hasRole('coordinator') && $user->id != '18129') {

            $user = Auth::user();
            // ! De momento selecciono los wss con el eje 2 porque no esta construido lo demas
            $idwss = Workshop::where('work_edge', 2)->pluck('id');

            try {
                $data = array();
                try {
                    $users = UserWorkshop::whereIn('workshop_id', $idwss)->get();
                } catch (\Error $e) {
                    return "Error loading user workshops";
                }
                foreach ($users as $i) {
                    $workshopRegDataUser = [];
                    if ($i->workshop_id == 38) {
                        try {
                            $reutronicUser =  ReutronicUser::where('user_workshop_id', $i->id)->first();
                            if ($reutronicUser !== null) {
                                $workshopRegDataUser = [
                                    'Material Solicidato' => $reutronicUser->material,
                                    'Detalles del material solicitado' => $reutronicUser->detalles,
                                    'Razon de uso del material solicitado' => $reutronicUser->razondeuso
                                ];
                            } else {
                                $workshopRegDataUser = [];
                            }
                        } catch (\Error $e) {
                            return "error en reutronic";
                        }
                    } elseif ($i->workshop_id == 36) {
                        try {
                            $unirodadaUser = $i->unirodadaUser;
                            if ($unirodadaUser !== null) {
                                $workshopRegDataUser = [
                                    'Contacto de enmergencia' => $unirodadaUser->emergency_contact,
                                    'Tel. contacto de enmergencia' => $unirodadaUser->emergency_contact_phone,
                                    'Condición de salud' => $unirodadaUser->health_condition,
                                    'Grupo ciclista' => $unirodadaUser->group
                                ];
                            } else {
                                $workshopRegDataUser = [];
                            }
                        } catch (\Error $e) {
                            return "error unirodada";
                        }
                    }
                    try {
                        $_user = User::where('id', $i->user_id)->first();
                        $_ws = Workshop::where('id', $i->workshop_id)->first();
                        $_data = [
                            'id' => $_user->id,
                            'email' => $_user->email,
                            'gender' => $_user->gender,
                            'name' => $_user->name . ' ' . $_user->middlename . ' ' . $_user->surname,
                            'workshop' => $_ws->name,
                            'curp' => $_user->curp,
                            'tel' => $_user->phone_number,
                            'created_at' => $_user->created_at->format('Y-m-d h:i'),
                            'workshopRegDataUser' => $workshopRegDataUser
                            // 'envio' => $i->send,
                            // 'pago' => $i->paid,
                            // 'factura' => $i->invoice_data
                        ];
                        array_push($data, $_data);
                    } catch (\Error $e) {
                        return "Cargando datos";
                    }
                }
            } catch (\Exception $e) {
                return $e;
            }

            return view('auth.Dashbord.admin_coordinador', [
                'is_ce' => $ce_active,
                'user' => $user,
                'users' => $data,
                'Modulos' => Auth::user()->userModules,
            ]);

            // ! VISTA ANTIGUA  
            // $users = $this->getGestionAmbientalUsers();
            // // return $users;
            // return view('auth.Dashbord.Administracion_nohelper', [
            //     'users' =>  $users,
            //     'Modulos' => Auth::user()->userModules,
            // ]);

            //Vista para nuevo curso Slow Fashion 2023
            }else if ($user->hasRole('coordinator') && $user->id == '18129') {

                $user = Auth::user();
                try {
                    $data = array();
                    try {
                        $users = UserWorkshop::where('workshop_id', '=' , '45')->get();
                        $users2 = UserWorkshop::where('workshop_id', '=' , '46')->get();
                        
                    } catch (\Error $e) {
                        return "Error loading user workshops";
                    }
                    foreach ($users as $i) {
                        $workshopRegDataUser = [];
                        try {
                            $_user = User::where('id', $i->user_id)->first();
                            $_ws = Workshop::where('id', $i->workshop_id)->first();
                            $_data = [
                                'id' => $_user->id,
                                'email' => $_user->email,
                                'gender' => $_user->gender,
                                'name' => $_user->name . ' ' . $_user->middlename . ' ' . $_user->surname,
                                'workshop' => $_ws->name,
                                'curp' => $_user->curp,
                                'tel' => $_user->phone_number,
                                'created_at' => $_user->created_at->format('Y-m-d h:i'),
                                'workshopRegDataUser' => $workshopRegDataUser
                                // 'envio' => $i->send,
                                // 'pago' => $i->paid,
                                // 'factura' => $i->invoice_data
                            ];
                            array_push($data, $_data);
                        } catch (\Error $e) {
                            return "Cargando datos";
                        }
                        
                    }
                    foreach ($users2 as $i) {
                        $workshopRegDataUser = [];
                        try {
                            $_user = User::where('id', $i->user_id)->first();
                            $_ws = Workshop::where('id', $i->workshop_id)->first();
                            $_data2 = [
                                'id' => $_user->id,
                                'email' => $_user->email,
                                'gender' => $_user->gender,
                                'name' => $_user->name . ' ' . $_user->middlename . ' ' . $_user->surname,
                                'workshop' => $_ws->name,
                                'curp' => $_user->curp,
                                'tel' => $_user->phone_number,
                                'created_at' => $_user->created_at->format('Y-m-d h:i'),
                                'workshopRegDataUser' => $workshopRegDataUser
                                // 'envio' => $i->send,
                                // 'pago' => $i->paid,
                                // 'factura' => $i->invoice_data
                            ];
                            array_push($data, $_data2);
                        } catch (\Error $e) {
                            return "Cargando datos";
                        }
                    }
                } catch (\Exception $e) {
                    return $e;
                }
    
                return view('auth.Dashbord.admin_coordinador', [
                    'is_ce' => $ce_active,
                    'user' => $user,
                    'users' => $data,
                    'Modulos' => Auth::user()->userModules,
                ]);

        } else if ($user->hasRole('administrator')) {
            $user = Auth::user();
            $idwss = Workshop::all()->pluck('id');
            try {
                $data = array();
                $users = UserWorkshop::whereIn('workshop_id', $idwss)->get();
                foreach ($users as $i) {
                    $workshopRegDataUser = [];
                    // * Append extra data
                    if ($i->workshop_id == 38) {
                        try {
                            $reutronicUser =  ReutronicUser::where('user_workshop_id', $i->id)->first();
                            if ($reutronicUser !== null) {
                                $workshopRegDataUser = [
                                    'Material Solicidato' => $reutronicUser->material,
                                    'Detalles del material solicitado' => $reutronicUser->detalles,
                                    'Razon de uso del material solicitado' => $reutronicUser->razondeuso
                                ];
                            } else {
                                $workshopRegDataUser = [];
                            }
                        } catch (\Error $e) {
                            return "error en reutronic";
                        }
                    } elseif ($i->workshop_id == 36) {
                        try {
                            $unirodadaUser = $i->unirodadaUser;
                            if ($unirodadaUser !== null) {
                                $workshopRegDataUser = [
                                    'Contacto de enmergencia' => $unirodadaUser->emergency_contact,
                                    'Tel. contacto de enmergencia' => $unirodadaUser->emergency_contact_phone,
                                    'Condición de salud' => $unirodadaUser->health_condition,
                                    'Grupo ciclista' => $unirodadaUser->group
                                ];
                            } else {
                                $workshopRegDataUser = [];
                            }
                        } catch (\Error $e) {
                            return "error unirodada";
                        }
                    }
                    try {
                        $_user = User::where('id', $i->user_id)->first();
                        $_ws = Workshop::where('id', $i->workshop_id)->first();
                        $_data = [
                            'id' => $_user->id,
                            'email' => $_user->email,
                            'gender' => $_user->gender,
                            'name' => $_user->name . ' ' . $_user->middlename . ' ' . $_user->surname,
                            'workshop' => $_ws->name,
                            'curp' => $_user->curp,
                            'tel' => $_user->phone_number,
                            'created_at' => $_user->created_at->format('Y-m-d h:i'),
                            'workshopRegDataUser' => $workshopRegDataUser
                        ];
                        array_push($data, $_data);
                    } catch (\Error $e) {
                        return "Cargando datos";
                    }
                }
            } catch (\Exception $e) {
                return $e;
            }
            return view('auth.Dashbord.Admin', [
                'is_ce' => $ce_active,
                'user' => $user,
                'users' => $data,
                'Modulos' => Auth::user()->userModules,
            ]);
        } else { //en dado caso es administrador
            $users = $this->getAllUsers(); # Todos los usuarios.
        }

        // return $users;
        return view('auth.Dashbord.Administracion_nohelper', [
            'is_ce' => $ce_active,
            'users' =>  $users,
            'Modulos' => Auth::user()->userModules,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EgresadoData(Request $request)
    {
        // return response()->json(['Message' => $request->all()], JsonResponse::HTTP_OK);

        try {
            $exist = DB::table('egresados_data')->where('user_id', $request->user()->id)->get();
            if ($exist->isEmpty()) {
                DB::table('egresados_data')
                    ->updateOrInsert([
                        'user_id' => $request->user()->id,
                        'posgrado' => $request->posgrado,
                        'gen' => $request->gen,
                        'ocupacion' => $request->ocupacion,
                        'sector' => $request->sector,
                        'empleador' => $request->nombre_empleador,
                        'contact_empleador' => $request->tel_empleador,
                        'email_empleador' => $request->email_empleador,
                        'comentarios' => $request->comentarios,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);

                $cu = ComiteUser::where('user_id', $request->user()->id)->get()->first();
                $cu->isform = true;
                $cu->timestamps = false;
                $cu->save();
            } else {
                return response()->json(['Message' => 'already exist'], JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => 'Error'], JsonResponse::HTTP_OK);
        }
        return response()->json(['Message' => 'correcto!'], JsonResponse::HTTP_OK);
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
        )->whereDoesntHave('roles', function ($query) {
            $query->whereIn('roles.name', ['administrator', 'coordinator']);
        })->whereHas('workshops', function ($query) {
            $query->where('name', 'Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?(27 Noviembre)');
        })->whereNotNull('email_verified_at')->orderBy('created_at')->get();
    }


    private function getUnihuertoUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function ($query) {
                return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->where('workshops.id', 9); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function ($q) {
                return $q->where('workshops.id', 9); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        //dd($res);
        return $res;
    }

    private function getUnihuertoAndHuertoMesaUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function ($query) {
                return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query
                    ->whereIn('workshops.id', [9, 11]); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [9, 11]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        //dd($res);
        return $res;
    }

    // Funcion actualizada sin renombrar: 
    // retorna usuarios de huerto a la mesa, unirodada y uniruta 
    private function getUnirodadaAndHuertoMesaUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function ($query) {
                return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query
                    ->whereIn('workshops.id', [15]); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [15]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        //dd($res);
        return $res;
    }


    // retorna usuarios de huerto a la mesa, unirodada y uniruta 
    private function getHelperUsers()
    {
        /*
                $users = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [15]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [15]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        # Consulta bien mortal para traer todo lo que se pide 
        $users = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [15]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [15]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();


        // # Consulta bien mortal para traer todo lo que se pide
        $users2 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [16]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [16]); //esto va a hacer un eager loading para que funcione el where anterior
            }])->with(['invoice_data'])
            ->get();

        // # Consulta bien mortal para traer todo lo que se pide
        $users3 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [17]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [17]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        // # Consulta bien mortal para traer todo lo que se pide
        $users4 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [18]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [18]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        // # Consulta bien mortal para traer todo lo que se pide
        $users5 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [36]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [36]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
            */
        #Unihuerto En casa
        $users = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [44]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [44]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        #Cursos de actualización 2023
        # Consulta bien mortal para traer todo lo que se pide 
        $users6 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [40]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [40]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        # Consulta bien mortal para traer todo lo que se pide 
        $users7 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [41]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [41]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();
        # Consulta bien mortal para traer todo lo que se pide 
        $users8 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [42]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [42]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        # Consulta bien mortal para traer todo lo que se pide 
        $users9 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [43]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [43]); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        $users10 = User::select(User::COLUMNS)->whereDoesntHave('roles', function ($query) {
            return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
        })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->whereIn('workshops.id', [45]); //where para sacar solo a los usuarios del 
            })->with(['workshops' => function ($q) {
                return $q->whereIn('workshops.id', [45]); //esto va a hacer un eager loading para que funcione el where anterior
            }])->with(['invoice_data'])
            ->get();
        
        foreach ($users6 as $user) $users->push($user);
        foreach ($users7 as $user) $users->push($user);
        foreach ($users8 as $user) $users->push($user);
        foreach ($users9 as $user) $users->push($user);
        foreach ($users10 as $user) $users->push($user);

        return $users;
    }

    private function getWithPayUsers() //Aun no correcta!!
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            ->whereDoesntHave('roles', function ($query) {
                return $query->whereIn('roles.name', ['administrator', 'coordinator']); //esto filtra y quita todos los usuarios que son admins y coordinadores
            })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->where('workshops.id', 44); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function ($q) {
                return $q->where('workshops.id', 44); //esto va a hacer un eager loading para que funcione el where anterior
            }])
            ->get();

        //dd($res);
        return $res;
    }

    // 28 -36
    private function getGestionAmbientalUsers()
    {
        # Consulta bien mortal para traer todo lo que se pide.
        $res = User::select(User::COLUMNS)
            // ->whereDoesntHave('roles', function($query){
            //     return $query->whereIn('roles.name', ['administrator','coordinator']);//esto filtra y quita todos los usuarios que son admins y coordinadores
            // })
            ->whereNotNull('email_verified_at')
            ->orderBy('created_at')
            ->whereHas('workshops', function ($query) {
                return $query->where('workshops.work_edge', 2); //where para sacar solo a los usuarios del unihuerto
            })->with(['workshops' => function ($q) {
                return $q->where('workshops.work_edge', 2); //esto va a hacer un eager loading para que funcione el where anterior
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
    public function PreloginControlEscolar(Request $r)
    {
        //return env("CONTROL_ESCOLAR_ACCESS_KEY");
        //return "s";
        $ak = env("CONTROL_ESCOLAR_ACCESS_KEY") != "" ? env("CONTROL_ESCOLAR_ACCESS_KEY") : "";
        return redirect("https://ambiental.uaslp.mx/controlescolar/auth/" . $r->user_id . "?ak=" . $ak);
        // ->with("user_id",$r->user_id)
        // ->with("ak",env("CONTROL_ESCOLAR_ACCESS_KEY"));
    }
}
