<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Models\Workshop;

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
        $workshops = $request->cursosInscritosMMUS ?? [];

        # Usuario autenticado
        $user = $request->user();

        foreach ($workshops as $workshop)
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

        /**
         * Actualiza los datos del usuario.
         */
        $user->zip_code = $request->CP;
        $user->residence = $request->LugarResidencia;
        $user->ocupation = $request->Ocupacion;
        $user->ethnicity = $request->GEtnico ?? $user->ethnicity;
        $user->disability = $request->Discapacidad ?? $user->disability;
        $user->ocupation = $request->Ocupacion;
        $user->courses = $request->CursosC ?? $user->courses;
        $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
        $user->disability = $request->Discapacidad ?? $user->disability;
        $user->comments = $request->ComentariosSugerencias ?? $user->comments;

        $user->save();
        

        return response()->json([ 'status' => 200], 200);
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
