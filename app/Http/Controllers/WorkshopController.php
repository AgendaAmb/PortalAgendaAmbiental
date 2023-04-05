<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Mail\RegisteredWorkshops;
use App\Mail\RegisteredPhotoContest;
use App\Mail\RegisteredMiniRodada;
use App\Mail\RegisretedUnirodada;
use App\Mail\RegisteredUnirodada;
use App\Mail\SendCompetencias;
use App\Mail\SendCursoCompetenciasMail;
use App\Models\Auth\User;
use App\Models\Workshop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\UserWorkshop;
use App\Models\GGJUser;
use Carbon\Carbon;
use App\Models\UnirodadaUser;
use App\Models\ReutronicUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class WorkshopController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Workshop Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que gestiona la lógica de los cursos y talleres de
    | la agenda ambiental.
    |
    */

    /**
     * Controlador de unirodadas.
     *
     * @var UnirodadaController
     */
    private $unirodada_controller;

    /**
     * Controlador de cursos actualizacion.
     *
     * @var caController
     */
    private $ca_controller;

    /**
     * Controlador de unirutas.
     *
     * @var UnirodadaController
     */
    private $uniruta_controller;

    /**
     * Crea el controlador y las dependencias requeridas para su
     * funcionamiento.
     */
    public function __construct()
    {
        $this->unirodada_controller = new UnirodadaController;
        $this->uniruta_controller = new UnirutaController;
        $this->ca_controller = new CursosActualizacionController;
    }


    public function GetWorkshops(Request $request)
    {
        $user = User::userById($request->id);
        $Workshops = [];


        return ($user->getRegisteredWorkshops());
    }

    /**
     * Stores a new user workshop
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkshopRequest $request)
    {
        try {
            # Cursos registrados por el usuario
            $courses = collect($request->cursosInscritosMMUS ?? []);

            # Usuario autenticado
            $user = $request->user();

            # Registra al usuario al evento o cursos especificados.
            if ($courses->count() > 0)
                $this->registerCourses($request, $courses);

            # Actualiza los datos del usuario.
            $user->zip_code = $request->CP ?? $user->zip_code;
            $user->residence = $request->LugarResidencia ?? $user->residence;
            $user->ocupation = $request->Ocupacion ?? $user->ocupation;
            $user->ethnicity = $request->GEtnico ?? $user->ethnicity;
            $user->disability = $request->Discapacidad ?? $user->disability;
            $user->ocupation = $request->Ocupacion ?? $user->ocupation;
            $user->courses = $request->CursoCursado ?? $user->courses;
            $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
            $user->disability = $request->Discapacidad ?? $user->disability;
            $user->comments = $request->ComentariosSugerencias ?? $user->comments;
            $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
            $user->academic_degree = $request->NAcademico ?? $user->academic_degree;
            $user->save();


            # Verifica si hay datos de facturación.
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }

            return new JsonResponse(['message' => 'Curso registrado'], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            Log::error('Ocurrió un error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    private function registerCourses(Request $request, $courses)
    {
        # Usuario autenticado
        $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

        # Cursos mmus del usuario y unirodadas.
        $workshops = $user->workshops()
            ->WherePivotNull('paid')
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->whereNotIn('name', $courses)
            ->pluck('workshops.id');


        # Se eliminan los cursos a los que no haya asistido y a
        # aquellos que haya eliminado del modal.
        $user->workshops()->detach($workshops);

        # Guarda en el log los cursos eliminados.
        Log::info('Se han desasociado los siguientes cursos: ', $workshops->toArray());
        Log::info('Para el usuario: ' . $user->email);
        Log::info('Cursos que se va a inscribir: ' . $courses);
        # Agrega cada uno de los cursos
        foreach ($courses as $workshop) {
            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', $workshop);

            # Registra el siguiente curso, en caso de que no exista.
            if ($workshop_model === null)
                continue;

            # Registra el siguiente curso, en caso de que el usuario ya
            # se haya registrado.
            if ($user->hasWorkshop($workshop))
                continue;

            # Actualiza los datos del aspirante, en caso de que se haya
            # inscrito a la unirodada.
            else if ($workshop_model->name === 'Unirodada cicloturística a la Cañada del Lobo')

                $this->unirodada_controller->registerUser($request, $user, $workshop_model);
            else
                $user->assignWorkshop($workshop_model->id);
        }

        # Obtiene los cursos registrados.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->get();

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.
        if ($workshops->count() > 0) {
            Log::info('Se ha registrado a los siguientes cursos: ', $workshops->toArray());
            Log::info('Al usuario: ' . $user->email);
        }

        if ($request->checkedFecha != []) {
            $workshop_model = Workshop::firstWhere('name', 'Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?(27 Noviembre)');
            $user->assignWorkshop($workshop_model->id);
            Mail::to($user)->send(new RegisteredWorkshops($workshop_model));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function markAsistence(Request $request)
    {
        # Obtiene el id del usuario registrado.
        $user = User::retrieveById($request->idUser, 'students')
            ?? User::retrieveById($request->idUser, 'workers')
            ?? User::retrieveById($request->idUser, 'externs');

        # Registra la asistencia del usuario.
        $user->workshops()->updateExistingPivot($request->idWorkshop, [
            'assisted_to_workshop' => true,
        ]);

        return response()->json(['Message' => 'Asistencia de usuario registrada'], JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Workshop::all();
    }
    public function getAllWorkshops()
    {

        return response()->json(Workshop::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerWorkShop(Request $request)
    {
        $workshop = new Workshop();
        $workshop->name = $request->nombreT;
        $workshop->description = $request->DescripcionT;
        $workshop->type = $request->TEvento;
        $workshop->work_edge = $request->Eje;
        $workshop->start_date = $request->FechaInicio;
        $workshop->end_date = $request->FechaFin;
        $workshop->save();
        Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    // TODO - Validar Fechas de registro
    public function WorkshopUserRegister(Request $request)
    {
        $band = false;
        /* Verificar workshop existente
     try {
        $request->validate([
            'workshop_id' => ['required|exists:workshops,id', Rule::exists('staff')->where(function ($query) {
                $query->where('account_id', 1);
            })]
        ]);
    } catch (\Exception $e) {
        return response()->json(['data' => "Request fields error"], JsonResponse::HTTP_OK);
    }
        */
        // TODO Verificar limite de usuarios por registro

        // * Verificar usuario registrado
        try {
            $already_registered = UserWorkshop::where('user_id', $request->user()->id)->where('workshop_id', $request->workshop_id)->where('workshop_id', '<>', '38')->first();
            if ($already_registered != null) {
                return response()->json(['data' => 'registered'], JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json(['data' => "Error validando datos"], JsonResponse::HTTP_OK);
        }

        try {
            # Usuario autenticado
            $user = $request->user();
            if (!empty($request['estadistic_data'])) {
                if ($request['estadistic_data']['insterested_on_events'] == "Si") {
                    $user->interested_on_further_courses = true;
                }
                if ($request['estadistic_data']['isAsistencia'] == "Si") {
                    $user->courses = $request['estadistic_data']['assisted_to'];
                }
                $user->comments = $request['estadistic_data']['comments'];
            }
            $user->save();
            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('id', $request->workshop_id);
            # Registra al usuario al workshop
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop_model->id,
                'sent' => false,
                'paid' => false,
                'invoice_data' => $request['invoice_data']['required'] == "Si" ? true : false,
                'payment_type' => $request['invoice_data']['payment_type']
            ]);

            if ($request['invoice_data']['required'] === 'Si' || $request['invoice_data']['required'] === 'si') {
                DB::table('invoice_data')
                    ->updateOrInsert(
                        [
                            'user_id' => $user->id,
                            'user_type' => $user->type
                        ],
                        [
                            'rfc' => $request['invoice_data']['rfc'],
                            'name' => $request['invoice_data']['name'],
                            'email' => $request['invoice_data']['email'],
                            'address' =>  $request['invoice_data']['addr'],
                            'phone' => $request['invoice_data']['tel']
                        ]
                    );
            }
            //Obtenemos la llave primaria de la tabla user_workshop
            $ws = DB::table('user_workshop')
                ->where('workshop_id', $workshop_model->id)
                ->where('user_id', $user->id)
                ->get();
            //Si es unitrueque, cargamos la información adicional a la tabla unitrueque_users
            if ($workshop_model->id == 10) {
                try {
                    DB::table('unitrueque_users')
                        ->updateOrInsert([
                            'user_workshop_id' => $ws[0]->id,
                            'MaterialesIntercambio' => $request['additional_data']['material'],
                            'Mobiliario' => $request['additional_data']['isMobiliario'],
                            'Cantidad' => $request['additional_data']['unidad'],
                            'EmpresaParticipante' => $request['additional_data']['empresa'],
                        ]);
                } catch (Exception $e) {
                    echo "error";
                }
            }
            //Si es reutronic, cargamos la información adicional a la tabla reutronic_users
            else if ($workshop_model->id == 38) {
                try {
                    DB::table('reutronic_users')
                        ->updateOrInsert([
                            'user_workshop_id' => $ws[0]->id,
                            'prev_solicitud' => intval($request['additional_data']['prev']),
                            'material' => $request['additional_data']['material'],
                            'detalles' => $request['additional_data']['specs'],
                            'razondeuso' => $request['additional_data']['reason'],
                        ]);
                } catch (Exception $e) {
                    echo "error";
                }
            }
            //Checamos si es minirodada 2023 y lo agregamos, realmente funciona con cualquier minirodada, sólo se tiene que cambiar el id del curso
            else if ($workshop_model->id == 48) {
                try {
                    //echo $request['additional_data']['kids'][0]['name'];
                    foreach ($request['additional_data']['kids'] as $member) {
                        DB::table('minirodada_users')->insert(
                            [
                                'user_workshop_id' => $ws[0]->id,
                                'name' => $member['name'],
                                'age' => (int) $member['age'],
                            ]
                        );
                    }
                } catch (Exception $e) {
                    echo "error";
                }
            }
            //Checamos si es rodada centenario 2023, el cual es de tipo unirodada por lo tanto los datos adicionales van a la tabla unirodada_users
            else if ($workshop_model->id == 49) {
                try {
                    $user_workshop->unirodadaUser()->create([
                        'user_workshop_id' => $ws[0]->id,
                        'emergency_contact' => $request['additional_data']['contact_name'],
                        'emergency_contact_phone' => $request['additional_data']['contact_tel'],
                        'group' => $request['additional_data']['group'],
                        'health_condition' => $request['additional_data']['health_condition'],
                    ]);
                } catch (Exception $e) {
                    echo "error";
                }
            }
        } catch (Exception $e) {
            return response()->json(['data' => "Error de procesamiento"], JsonResponse::HTTP_OK);
        }
        //Switch-case para enviar los correos ya que dependiendo del curso registrado, se envía diferente información
        switch ($workshop_model->id) {
            case 47:
                //echo "Fotografía";
                Mail::to($user)->send(new RegisteredPhotoContest($workshop_model));
                break;
            case 48:
                //echo "Minirodada";
                Mail::to($user)->send(new RegisteredMiniRodada($workshop_model));
                break;
            case 49:
                //echo "Rodada Centenario";
                Mail::to($user)->send(new RegisteredUnirodada($workshop_model));
                break;
            default:
                Mail::to($user)->send(new RegisteredWorkshops($workshop_model));
                break;
        }
        return response()->json(['data' => 'ok'], JsonResponse::HTTP_OK);
    }

    //* REGISTRA UN WORKSHOP DE UNRIDODADA EN GENERAL 
    public function WorkshopUnirodadaUserRegister(Request $request)
    {

        # Usuario autenticado
        $user = $request->user();

        // TODO Es una validación muy sencilla por cuestiones de tiempo
        try {
            $request->validate([
                'ws_id' => 'required|exists:workshops,id'
            ], [
                'ws_id.required' => 'Workshop_id not recognized',
                'ws_id.exists' => 'Workshop_id doesnt exist',
            ]);
        } catch (\Exception $e) {
            return response()->json(['data' => "Request error"], JsonResponse::HTTP_OK);
        }

        $uws = $user->workshops->where('id', $request->ws_id);

        // Comprobar si ya se encuentra registrado el usuario
        if (!$uws->isEmpty()) {
            return response()->json(['data' => "Usuario registrado"], JsonResponse::HTTP_OK);
        }

        try {
            # Actualiza los datos del usuario.
            $user->interested_on_further_courses = $request->interested ?? $user->interested_on_further_courses;

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('id', $request->ws_id);

            if (($workshop_model->id == 23 && UserWorkshop::where('workshop_id', 23)->count() > 50)) {
                return response()->json(['data' => "Limite de usuarios alcanzado"], JsonResponse::HTTP_OK);
            }

            # Registra al usuario al workshop
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop_model->id,
                'sent' => false,
                'paid' => false,
            ]);

            # Sanitiza el grupo de ciclistas.
            $group = Str::lower(trim($request->group));

            //* Registra los datos de unirodada del usuario.
            $user_workshop->unirodadaUser()->create([
                'user_workshop_id' => $user_workshop->id,
                'emergency_contact' => $request->contact_name,
                'emergency_contact_phone' => $request->contact_tel,
                'group' => $group,
                'health_condition' => $request->health_condition
            ]);

            //* A los miembros del staff no se les cobra
            if ($user_workshop->unirodadaUser->group === 'staff') {
                $user_workshop->paid = true;
                $user_workshop->paid_at = Carbon::now();
                //* A la FUP se le otorgan 10 becas.
            } else if ($user_workshop->unirodadaUser->group === 'fup') {
                # Total de ciclistas de la fup.
                $num_becas_fup = UnirodadaUser::where('group', 'fup')
                    ->whereIn('user_workshop_id', UserWorkshop::where('workshop_id', $workshop_model->id)
                        ->pluck('id'))
                    ->count();

                if ($num_becas_fup < 10) {
                    $user_workshop->paid = true;
                    $user_workshop->paid_at = Carbon::now();
                }
            }
            // Guardar los cambios
            $user_workshop->save();
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }
        return response()->json(['Message' => 'ok!'], JsonResponse::HTTP_OK);
    }

    public function RegistrarKids(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user();

            $insc = DB::table('user_workshop')
                ->where('workshop_id', 35)  //!  MInirodada
                ->where('user_id', $user->id)
                ->get();

            // Registrado?
            if ($insc->count() > 0) {
                return response()->json(['Message' => 'Registered'], JsonResponse::HTTP_OK);
            }


            # Registra interes en asistencia
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }

            $user->save();

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', 'Minirodada MMUS2022');

            # Registra al usuario al workshop
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop_model->id,
                'sent' => false,
                'paid' => false,
            ]);

            try {
                # Guardar los miembros del equipo
                foreach ($request->kids as $member) {
                    DB::table('minirodada_users')->insert(
                        [
                            'user_workshop_id' => $user_workshop->id,
                            'name' => $member['name'],
                            'age' => $member['age']
                        ]
                    );
                }
            } catch (\Exception $e) {
                $user_workshop->delete();
                return response()->json(['Message' => 'Team data error'], JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => 'error'], 500);
        }
        return response()->json(
            ['Message' => 'ok'],
            JsonResponse::HTTP_OK
        );
    }

    public function ChecarReutronic(Request $request)
    {
        $user = $request->user();

        $workshop_model = Workshop::where('name', 'Reutronic')->first();

        $insc = DB::table('user_workshop')
            ->where('workshop_id', $workshop_model->id)
            ->where('user_id', $user->id)
            ->get();
        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarReutronic(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user();

            $workshop_model = Workshop::where('name', 'Reutronic')->first();

            $insc = DB::table('user_workshop')
                ->where('workshop_id', $workshop_model->id)  //!  MInirodada
                ->where('user_id', $user->id)
                ->get();

            // Registrado?
            if ($insc->count() > 0) {
                return response()->json(['Message' => 'Registered'], JsonResponse::HTTP_OK);
            }


            # Registra interes en asistencia
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }

            $user->save();

            # Registra al usuario al workshop
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop_model->id,
                'sent' => false,
                'paid' => false,
            ]);

            try {
                # Registra los datos de reutronic
                ReutronicUser::create([
                    'user_workshop_id' => $user_workshop->id,
                    'prev_solicitud' => $request->prev_solicitud == 'true' ? true : false,
                    'material' => $request->materialReutronic,
                    'detalles' => $request->observacionesReutronic,
                    'razondeuso' => $request->razonReutronic,
                ]);
            } catch (\Exception $e) {
                $user_workshop->delete();
                return response()->json(['Message' => 'Error registro'], JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => 'error'], 500);
        }
        return response()->json(
            ['Message' => 'ok'],
            JsonResponse::HTTP_OK
        );
    }

    public function ChecarKids(Request $request)
    {
        //Esta inscrito?
        $user = $request->user();

        $insc = DB::table('user_workshop')
            ->where('workshop_id', 35)  // GGJ Workshop
            ->where('user_id', $user->id)
            ->get();

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function FormatoMinirodada()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = "./download/Carta_responsiva_Minirodada.pdf";
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, 'FormatoMiniRodada2023.pdf', $headers);
    }


    public function RegistrarGGJ(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            $insc = DB::table('user_workshop')
                ->where('workshop_id', 24)  //! GGJ Workshop
                ->where('user_id', $user->id)
                ->get();

            // Registrado?
            if ($insc->count() > 0) {
                return response()->json(['Message' => 'Registered'], JsonResponse::HTTP_OK);
            }


            # Registra interes en asistencia
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }

            $user->save();

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', 'Global Goals Jam');

            # Registra al usuario al workshop
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop_model->id,
                'sent' => false,
                'paid' => false,
            ]);

            try {
                # Guardar los miembros del equipo
                foreach ($request->team as $member) {
                    DB::table('ggj_users')->insert(
                        [
                            'user_workshop_id' => $user_workshop->id,
                            'name' => $member['name'],
                            'email' => $member['email'],
                            'phone_number' => $member['tel'],
                            'institution' => $member['inst'],
                            'nedu' => $member['nedu']
                        ]
                    );
                }
            } catch (\Exception $e) {
                $user_workshop->delete();
                return response()->json(['Message' => 'Team data error'], JsonResponse::HTTP_OK);
            }

            //PDF file is stored under project/public/download/info.pdf
            $file = "./download/FormatoMinirodada.pdf";

            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            response()->download($file, 'FormatoMiniRodadaMMUS2022.pdf', $headers);
        } catch (\Exception $e) {
            return response()->json(['Message' => 'error'], 500);
        }
        return response()->json(['Message' => 'ok'], JsonResponse::HTTP_OK);
    }

    public function ChecarGGJ(Request $request)
    {
        //Esta inscrito?
        $user = $request->user();

        $insc = DB::table('user_workshop')
            ->where('workshop_id', 24)  // GGJ Workshop
            ->where('user_id', $user->id)
            ->get();

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarCAUsuario(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            // Actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursoCursado;
            }
            $user->save();

            # Cursos mmus del usuario y unirodadas.
            $workshops = $user->workshops()
                ->WherePivotNull('paid')
                ->wherePivotNull('assisted_to_workshop')
                ->orWherePivot('assisted_to_workshop', false)
                ->pluck('workshops.id');


            # Se eliminan los cursos a los que no haya asistido y a
            # aquellos que haya eliminado del modal.
            $user->workshops()->detach($workshops);

            # Busca cursos
            $workshop_models = array();

            //if($request->REGS)array_push($workshop_models, Workshop::firstWhere('id',16));
            //if($request->RIA)array_push($workshop_models, Workshop::firstWhere('id',17));
            //if($request->SCMU)array_push($workshop_models, Workshop::firstWhere('id',18));
            //Registros 2023
            if ($request->DRE) array_push($workshop_models, Workshop::firstWhere('id', 40));
            if ($request->EUP) array_push($workshop_models, Workshop::firstWhere('id', 41));
            if ($request->GOPA) array_push($workshop_models, Workshop::firstWhere('id', 42));
            if ($request->TSCA) array_push($workshop_models, Workshop::firstWhere('id', 43));


            $this->ca_controller->registerUser($request, $user, $workshop_models);
            # la relación con esta tabla esta bien fea mens 
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.
        Mail::to($user)->send(new RegisteredWorkshops($workshop_models));
        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function RegistrarMmus2022(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            // Grado academico
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            // Interes de asistencia nuevos cursos
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }
            // Asistencia a cursos
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursoCursado;
            }
            $user->save();

            # Cursos mmus del usuario y unirodadas.
            $workshops = $user->workshops()
                ->WherePivotNull('paid')
                ->wherePivotNull('assisted_to_workshop')
                ->orWherePivot('assisted_to_workshop', false)
                ->pluck('workshops.id');


            # Se eliminan los cursos a los que no haya asistido y a
            # aquellos que haya eliminado del modal.
            $user->workshops()->detach($workshops);

            # Busca cursos
            $workshop_models = array();

            if ($request->registros['iutt']) array_push($workshop_models, Workshop::firstWhere('id', 28));
            if ($request->registros['cccv']) array_push($workshop_models, Workshop::firstWhere('id', 29));
            if ($request->registros['pm']) array_push($workshop_models, Workshop::firstWhere('id', 30));
            if ($request->registros['wwc']) array_push($workshop_models, Workshop::firstWhere('id', 31));
            if ($request->registros['fa']) array_push($workshop_models, Workshop::firstWhere('id', 32));
            if ($request->registros['tb']) array_push($workshop_models, Workshop::firstWhere('id', 33));
            if ($request->registros['pikt']) array_push($workshop_models, Workshop::firstWhere('id', 34));

            foreach ($workshop_models as $workshop) {
                # Registra al usuario en user workshops.
                $user_workshop = UserWorkshop::create([
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'workshop_id' => $workshop->id,
                    'sent' => false,
                    'paid' => false,
                    'invoice_data' => false,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], JsonResponse::HTTP_OK);
        }

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.

        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    // Chacar usuario registrado en cursos de actualización
    public function ChecarMmus2022(Request $request)
    {
        $user = Auth::user();
        $inscriptions = $request->courses;
        $flag = false;

        try {
            $inscriptions['iutt'] = UserWorkshop::where('workshop_id', 28)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['cccv'] = UserWorkshop::where('workshop_id', 29)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['pm'] = UserWorkshop::where('workshop_id', 30)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['wwc'] = UserWorkshop::where('workshop_id', 31)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['fa'] = UserWorkshop::where('workshop_id', 32)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['tb'] = UserWorkshop::where('workshop_id', 33)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
            $inscriptions['pikt'] = UserWorkshop::where('workshop_id', 34)
                ->where('user_id', $user->id)
                ->first() === null ? false : true;
        } catch (Exception $e) {
            return response()->json(['flag' => $flag, 'data' => 'error'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (
            $inscriptions['iutt'] && $inscriptions['cccv'] && $inscriptions['pm']
            && $inscriptions['wwc'] && $inscriptions['fa'] && $inscriptions['tb']
            && $inscriptions['pikt']
        ) $flag = true;

        return response()->json(['flag' => $flag, 'data' => $inscriptions], JsonResponse::HTTP_OK);
    }

    // Chacar usuario registrado en cursos de actualización
    public function ChecarCAUsuario(Request $request)
    {
        $inscriptions = array();
        $flag = false;

        try {
            /*
            $inscriptions['REGS'] = UserWorkshop::where('workshop_id', 16)
            ->where('user_id', $request->Clave)
            ->first()===null?false:true;
            $inscriptions['RIA'] = UserWorkshop::where('workshop_id', 17) 
            ->where('user_id', $request->Clave)
            ->first()===null?false:true;
            $inscriptions['SCMU'] = UserWorkshop::where('workshop_id', 18)
            ->where('user_id', $request->Clave)
            ->first()===null?false:true;
            */
            //Cursos de actualizacion 2023
            $inscriptions['DRE'] = UserWorkshop::where('workshop_id', 40)
                ->where('user_id', $request->Clave)
                ->first() === null ? false : true;
            $inscriptions['EUP'] = UserWorkshop::where('workshop_id', 41)
                ->where('user_id', $request->Clave)
                ->first() === null ? false : true;
            $inscriptions['GOPA'] = UserWorkshop::where('workshop_id', 42)
                ->where('user_id', $request->Clave)
                ->first() === null ? false : true;
            $inscriptions['TSCA'] = UserWorkshop::where('workshop_id', 43)
                ->where('user_id', $request->Clave)
                ->first() === null ? false : true;
        } catch (Exception $e) {
            return response()->json(['flag' => $flag, 'data' => 'error'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($inscriptions['DRE'] && $inscriptions['EUP'] && $inscriptions['GOPA'] && $inscriptions['TSCA']) $flag = true;

        return response()->json(['flag' => $flag, 'data' => $inscriptions], JsonResponse::HTTP_OK);
    }

    public function RegistrarRodadaRioUsuario(Request $request)
    {

        try {
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            # Actualiza los datos del usuario.
            $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;

            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }

            # Cursos mmus del usuario y unirodadas.
            $workshops = $user->workshops()
                ->WherePivotNull('paid')
                ->wherePivotNull('assisted_to_workshop')
                ->orWherePivot('assisted_to_workshop', false)
                ->pluck('workshops.id');


            # Se eliminan los cursos a los que no haya asistido y a
            # aquellos que haya eliminado del modal.
            $user->workshops()->detach($workshops);

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', 'Unirodada por los rios');

            $this->unirodada_controller->registerUser($request, $user, $workshop_model);

            # Verifica si hay datos de facturación.
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        # Obtiene los cursos registrados.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->get();

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.
        if (
            $workshops->count() > 0
        ) {
            Log::info('Se ha registrado a los siguientes cursos: ', $workshops->toArray());
            Log::info('Al usuario: ' . $user->email);
        }

        //4. si todo sale bien regresamos un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarRodadaMmus(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 36) // 36 RODADA MMUS 2022
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if (
            $insc->count() > 0
        ) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarRodadaMmus(Request $request)
    {
        try {
            # Usuario autenticado
            $user = $request->user();

            # Actualiza los datos del usuario.
            $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;

            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', 'Unirodada MMUS2022');

            $this->unirodada_controller->registerUser($request, $user, $workshop_model);

            # la relación con esta tabla esta bien fea mens 
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //4. si todo sale bien regresamos un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarRodadaRioUsuario(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 12) // 12 - Unirodada por los rios
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarUnirutaUsuario(Request $request)
    {

        try {
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            # Actualiza los datos del usuario.
            $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;

            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }

            # Cursos mmus del usuario y unirodadas.
            $workshops = $user->workshops()
                ->WherePivotNull('paid')
                ->wherePivotNull('assisted_to_workshop')
                ->orWherePivot('assisted_to_workshop', false)
                ->pluck('workshops.id');


            # Se eliminan los cursos a los que no haya asistido y a
            # aquellos que haya eliminado del modal.
            $user->workshops()->detach($workshops);

            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', 'Uniruta Cerro de San Pedro');

            $this->uniruta_controller->registerUser($request, $user, $workshop_model);

            # Verifica si hay datos de facturación.
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        # Obtiene los cursos registrados.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->get();

        # le envía un correo electrónico de confirmación.
        Mail::to($user)->send(new RegisteredWorkshops($workshop_model, public_path('attachments/carta_responsiva_uniruta.pdf')));

        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarUnirutaUsuario(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 39) // 39 - Uniruta cerro de san pedro
            ->where('user_id', $request->Clave)
            ->get();

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarCompetencias(Request $request)
    {
        $user = $request->user();

        try {
            # Se envía el comprobante de pago.
            Mail::mailer('smtp')->to($user->email)->send(new SendCursoCompetenciasMail());
        } catch (\Exception $e) {
            return response()->json(['Message' => "Error de correo"], 500);
        }

        try {
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);
            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }

            $user->save();

            //3. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 37,
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);
            // Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarCompetencias(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 37)
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarslowFashionUsuario(Request $request)
    {
        try {
            //throw new \Exception("mi excepcion");//para prueba
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            // Actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursoCursado;
            }
            $user->save();
            //2. checamos si requiere factura
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
            //3. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 45, // 45 = slowfashion 2023
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null,
                    'invoice_data' => $request->isFacturaReq == "Si" ? true : false,
                    'payment_type' => $request->Met_Pago
                ]);
            echo $request->Met_Pago;
            Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");

            $workshop_models = Workshop::firstWhere('id', 45);
            //array_push($workshop_models, Workshop::firstWhere('id',44));
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //Enviamos un correo de pre Registro
        Mail::to($user)->send(new RegisteredWorkshops($workshop_models));
        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarslowFashionUsuario(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 45)
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarUnihuertoCasaUsuario(Request $request)
    {
        try {
            //throw new \Exception("mi excepcion");//para prueba

            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);
            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. checamos si requiere factura
            if ($request->isFacturaReq == "Si" || $request->isFacturaReq == "si") {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ], [
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }
            //3. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 44, // 44 = unihuerto en casa 2023
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);
            Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");

            $workshop_models = Workshop::firstWhere('id', 44);
            //array_push($workshop_models, Workshop::firstWhere('id',44));
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //Enviamos un correo de pre Registro
        Mail::to($user)->send(new RegisteredWorkshops($workshop_models));
        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarUnihuertoCasaUsuario(Request $request)
    { //Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 44)
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarUnitruequeUsuario(Request $request)
    {
        //return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try {
            //throw new \Exception("mi excepcion");//para prueba

            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);
            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 10, // 10 = unitrueque
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);
            //3. creaamos registro para la uniformacion en tabla unitrueque_user
            $ws = DB::table('user_workshop')
                ->where('workshop_id', 10)
                ->where('user_id', $user->id)
                ->get();

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 10 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //3. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }

    public function ChecarUnitruequeUsuario(Request $request)
    { //Esta inscrito?
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 10)
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }
    public function RegistrarHuertoMesaHuastecaUsuario(Request $request)
    {
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try {
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 13, // 13 = del huerto a la mesa huasteca 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id', 13)
                ->where('user_id', $user->id)
                ->get();
            /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }


        //3. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }
    public function ChecarHuertoMesaHuastecaUsuario(Request $request)
    { //Esta inscrito?
        try {
            $insc = DB::table('user_workshop')
                ->where('workshop_id', 13)
                ->where('user_id', $request->Clave)
                ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);

            if ($insc->count() > 0) {
                return response()->json(true, JsonResponse::HTTP_OK);
            } else {
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }
    public function ChecarPromotores(Request $request)
    { //Esta inscrito?
        $insc = DB::table('user_workshop')
            ->where('workshop_id', 46)
            ->where('user_id', $request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if ($insc->count() > 0) {
            return response()->json(true, JsonResponse::HTTP_OK);
        } else {
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarPromotores(Request $request)
    {
        try {
            //throw new \Exception("mi excepcion");//para prueba
            # Usuario autenticado
            $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');

            // Actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursoCursado;
            }
            $user->save();

            //3. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 46, // 46 = Promotores Ambientales 2023
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null,

                ]);
            Log::info('El usuario con id ' . $request->idUser . "registro un nuevo workshop ");

            $workshop_models = Workshop::firstWhere('id', 46);
            //array_push($workshop_models, Workshop::firstWhere('id',44));
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }

        //Enviamos un correo de pre Registro
        Mail::to($user)->send(new RegisteredWorkshops($workshop_models));
        //4. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }
    public function RegistrarPromotoresHuastecaUsuario(Request $request)
    {
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try {
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 14, // 14 = promotores huasteca 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id', 14)
                ->where('user_id', $user->id)
                ->get();
            /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }


        //3. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }
    public function ChecarPromotoresHuastecaUsuario(Request $request)
    { //Esta inscrito?
        try {
            $insc = DB::table('user_workshop')
                ->where('workshop_id', 14)
                ->where('user_id', $request->Clave)
                ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);

            if ($insc->count() > 0) {
                return response()->json(true, JsonResponse::HTTP_OK);
            } else {
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarHuertoMesaUsuario(Request $request)
    {
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try {
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if ($request->NAcademico != "") {
                $user->academic_degree = $request->NAcademico;
            }
            if ($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si") {
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if ($request->isAsistencia == "Si" || $request->isAsistencia == "si") {
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 11, // 11 = del huerto a la mesa 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id', 11)
                ->where('user_id', $user->id)
                ->get();
            /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage()], 500);
        }


        //3. si todo sale bien regresamo un ok
        return response()->json(['Message' => 'Curso registrado'], JsonResponse::HTTP_OK);
    }
    //*/
    public function ChecarHuertoMesaUsuario(Request $request)
    { //Esta inscrito?
        try {
            $insc = DB::table('user_workshop')
                ->where('workshop_id', 11)
                ->where('user_id', $request->Clave)
                ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);

            if ($insc->count() > 0) {
                return response()->json(true, JsonResponse::HTTP_OK);
            } else {
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }
}
