<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WorkshopController extends Controller
{
    /**
     * Store a newly created resource in storage.
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


        if ($request->TipoEvento !== null) {
            if ($this->registerEvent($request) === false) {
                return response()->json([ 'message' => 'No existe el tipo de evento especificado' ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        else if ($courses->count() > 0) {
            $this->registerCourses($request, $courses);
        }
        else {
            return response()->json([ 'message' => 'Especifica uno o más cursos' ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        # Actualiza los datos del usuario.
        $user->zip_code ??= $request->CP;
        $user->residence ??= $request->LugarResidencia;
        $user->ocupation ??= $request->Ocupacion;
        $user->ethnicity ??= $request->GEtnico;
        $user->disability ??= $request->Discapacidad;
        $user->ocupation ??= $request->Ocupacion;
        $user->courses ??= $request->CursosC;
        $user->interested_on_further_courses ??= $request->InteresAsistencia;
        $user->disability ??= $request->Discapacidad;
        $user->comments ??= $request->ComentariosSugerencias;
        $user->emergency_contact ??= $request->NombreContacto;
        $user->emergency_contact_phone ??= $request->CelularContacto;
        $user->interested_on_further_courses ??= $request->InteresAsistencia;
        $user->previous_courses ??= $request->CursosC;

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

        # Indica que el evento no existe en la base de datos.
        if ($event === null)
            return false;

        # Verifica que el usuario no esté registrado en el evento.
        if ($user->hasWorkshop($event->name))
            return false;

        $user->workshops()->attach($event->id);

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
        $mmus_courses = $user->workshops()->tipo('curso')->pluck('id');
        $user->workshops()->detach($mmus_courses);

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
