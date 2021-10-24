<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Correos;
use App\Mail\EmailLayout;
use App\Models\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(SendEmailRequest $request)
    {
        $data = $request->validated();
        $eje = Correos::firstWhere('email', $data['CorreoRemitente'])->eje->name;

        $users = User::whereHas('workshops', function($query) use ($data){
            $query->where('name', $data['Destinatario']);
        })->orWhereHas('userModules', function($query) use ($data){
            $query->where('name', $data['Destinatario']);
        })->get();

        Mail::to($users)->send(new EmailLayout($data['Contenido'], $eje, $data['Asunto']));
        return new JsonResponse(['message' => 'Correo enviado exitosamente'], JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function show(Correos $correos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function edit(Correos $correos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correos $correos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correos $correos)
    {
        //
    }
}
