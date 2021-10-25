<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idUsuarioEnvio' => ['required','exists:users,id','numeric'],
            'CorreoRemitente' => ['required', 'exists:email_accounts,email', 'email'],
            'Destinatario' => ['required', 'string'],
            'Asunto' => ['required', 'string'],
            'Contenido' => ['required', 'string']
        ];
    }
}
