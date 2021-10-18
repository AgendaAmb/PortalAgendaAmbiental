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
            'work_edge' => ['required', 'string', 'in:Gestión,Educación,Vinculación,Comunicación,RTIC'],
            'emails' => ['required', 'array'],
            'emails.*' => ['required','email'],
            'subject' => ['required','string'],
            'content' => ['required','string'],
        ];
    }
}
