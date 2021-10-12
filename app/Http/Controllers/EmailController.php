<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Envía el correo electrónico a los usuarios especificados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(SendEmailRequest $request)
    {
        
    }
}
