<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Mail\RegisteredWorkshops;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class WorkshopController extends Controller
{
    public function GetWorkshops(Request $request){
        $user=User::userById($request->id);
        $Workshops=[];


        return($user->getRegisteredWorkshops());
    }

    /**
     * Stores a new user workshop
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkshopRequest $request)
    {
        # Cursos registrados por el usuario
        $courses = collect($request->cursosInscritosMMUS ?? []);

        # Usuario autenticado
        $user = $request->user();

        # Registra al usuario al evento o cursos especificados.
        if ($request->TipoEvento !== null) {
            if ($this->registerEvent($request) === false) {
                return response()->json([ 'message' => 'No existe el tipo de evento especificado' ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        else {
            $this->registerCourses($request, $courses);
        }

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
        $user->emergency_contact = $request->NombreContacto ?? $user->emergency_contact;
        $user->emergency_contact_phone = $request->CelularContacto ?? $user->emergency_contact_phone;
        $user->grupoCiclista = $request->GrupoC ?? $user->grupoCiclista;
        $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
        $user->health_condition = collect($request->CondicionSalud ?? [])->first() ?? $user->health_condition;
        $user->save();

        return response()->json([ 'status' => 200], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function registerEvent(Request $request)
    {
        # Usuario autenticado
        $user = $request->user();

        # Obtiene el evento de la unirodada.
        $event = Workshop::tipo($request->TipoEvento)->latest('created_at')->first();
        $events = Workshop::tipo($request->TipoEvento)->latest('created_at')->get();

        # Indica que el evento no existe en la base de datos.
        if ($event === null)
            return false;

        # Registra el evento al usuario.
        if (!$user->hasWorkshop($event->name))
        {
            $user->workshops()->attach($event->id);
            Mail::to($user)->send(new RegisteredWorkshops(collect($events)));
        }

        return true;
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
        $user = $request->user();

        # Cursos mmus del usuario.
        $mmus_courses = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->tipo('curso')
            ->whereNotIn('name', $courses)
            ->pluck('id');

        # Se eliminan los cursos a los que no haya asistido y a
        # aquellos que haya eliminado del modal.
        $user->workshops()->detach($mmus_courses);

        # Agrega cada uno de los cursos
        foreach ($courses as $workshop)
        {
            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', $workshop);

            # Registra el siguiente curso, en caso de que no exista.
            if ($workshop_model === null)
                continue;

            # Registra el siguiente curso, en caso de que el usuario ya
            # se haya registrado.
            if ($user->hasWorkshop($workshop))
                continue;

            $user->workshops()->attach($workshop_model->id);
        }

        $workshops = $user->workshops()->tipo('curso')->get();

        Mail::to($user)->send(new RegisteredWorkshops($workshops));
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

        return response()->json([ 'Message' => 'Asistencia de usuario registrada' ], JsonResponse::HTTP_OK);
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
}
