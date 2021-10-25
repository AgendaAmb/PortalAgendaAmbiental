<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Correos;
use App\Mail\EmailLayout;
use App\Models\Auth\User;
use App\Models\EmailAccount;
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
        $eje = EmailAccount::firstWhere('email', $data['CorreoRemitente'])->workEdge->name;

        dd($eje);

        $users = User::whereHas('workshops', function($query) use ($data){
            $query->where('name', $data['Destinatario']);
        })->orWhereHas('userModules', function($query) use ($data){
            $query->where('name', $data['Destinatario']);
        })->get();

        Mail::to($users)->send(new EmailLayout($data['Contenido'], $eje, $data['Asunto']));
        return new JsonResponse(['message' => 'Correo enviado exitosamente'], JsonResponse::HTTP_OK);
    }
}
