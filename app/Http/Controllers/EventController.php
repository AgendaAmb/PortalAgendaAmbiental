<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Usuario autenticado
        $user = $request->user();

        # Obtiene el evento de la unirodada.
        $event = Event::tipoEvento($request->TipoEvento)->latest('created_at')->first();

        # Indica que el evento no existe en la base de datos.
        if ($event === null)
            return response()->json([
                'message' => 'El evento especificado no está registrado'
            ], 500);

        # Verifica que el usuario no esté registrado en el evento.
        if ($user->hasEvent($event->name))
            return response()->json([
                'message' => 'El usuario ya está registrado'
            ], 422);

        /**
         * Actualiza los datos del usuario.
         */
        $user->ocupation = $request->Ocupacion;
        $user->ethnicity = $request->GEtnico ?? $user->ethnicity;
        $user->emergency_contact = $request->NombreContacto ?? $user->emergency_contact;
        $user->emergency_contact_phone = $request->CelularContacto ?? $user->emergency_contact_phone;
        $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
        $user->save();

        $user->events()->attach($event->id);

        return response()->json([ 'message' => 'Usuario registrado exitosamente'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Event::all();
    }
}
