<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Mail\RegisteredWorkshops;
use App\Models\Auth\User;
use App\Models\Workshop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
     * Crea el controlador y las dependencias requeridas para su
     * funcionamiento.
     */
    public function __construct()
    {
        $this->unirodada_controller = new UnirodadaController;
    }


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
        try
        {

        # Cursos registrados por el usuario
        $courses = collect($request->cursosInscritosMMUS ?? []);

        # Usuario autenticado
        $user = $request->user();

        # Registra al usuario al evento o cursos especificados.
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
        $user->save();

        return response()->json([ 'status' => 200], 200);
        } catch (Exception $e)
        {
            Storage::append('algo.txt', 'el error fue:'. $e->getMessage());
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
        $user = $request->user();

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
        if ($workshops->count() > 0)
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
