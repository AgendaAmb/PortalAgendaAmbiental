<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PruebaRequest extends FormRequest
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
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
    {
        //dd($this->all());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.Token' => ['required', 'string'],
            '*.Clave_proveedor' => ['required', 'string'],
            '*.Imei' => ['required', 'string'],
            '*.Economico' => ['required', 'string'],
            '*.Latitud' => ['required', 'string'],
            '*.Longuitud' => ['required', 'string'],
            '*.Velocidad' => ['required', 'string'],
            '*.Odometro' => ['required', 'string'],
            '*.Placa' => ['required', 'string'],
            '*.Satelites' => ['required', 'int'],
            '*.Fecha_evento' => ['required', 'date', 'date_format:Y-m-d\ H:i:s'],
            '*.Fecha_envio' => ['required', 'date', 'date_format:Y-m-d\ H:i:s', 'after_or_equal:Fecha_evento']
        ];
    }
}
