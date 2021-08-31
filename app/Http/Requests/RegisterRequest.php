<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        # Valida el correo de la uaslp.
        $response = Http::post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', [
            'username' => $this->email ?? null
        ]);

        # Guarda el directorio activo en la sesión.
        if ($response->successful())
        {
            $response_data = $response->json()['data'];

            $this->merge([
                'DirectorioActivo' => $response_data['DirectorioActivo'],
                'ClaveUASLP' => $response_data['ClaveUASLP'],
                'Nombres' => $response_data['name'],
                'ApellidoP' => $response_data['first_surname'],
                'ApellidoM' => $response_data['last_surname'] ?? null,
            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombres' => [ 'required', 'string', 'max:255' ],
            'ApellidoP' => [ 'required', 'string', 'max:255' ],
            'ApellidoM' => [ 'nullable', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:externs,email', 'unique:students,email', 'unique:workers,email' ],
            'password' => [ Rule::requiredIf($this->DirectorioActivo === null) ],
            'passwordR' => [ Rule::requiredIf($this->DirectorioActivo === null), 'same:password' ],
            'Pais' => [ 'required' ],
            'Tel' => [ 'required', 'numeric' ],
            'CURP' => [
                'nullable',
                'required_if:Pais,México','size:18',
                'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i',
                'unique:externs,curp',
                'unique:students,curp',
                'unique:workers,curp',
            ],
            'Edad' => ['required','numeric'],
            'LugarResidencia' => ['required','string'],
            'Genero' => ['required','in:Masculino,Femenino,Otro,NoEspecificar'],
            'OtroGenero' => ['required_if:Genero,Otro'],
            //'CorreoAlterno' => ['required'],
        ];
    }
}