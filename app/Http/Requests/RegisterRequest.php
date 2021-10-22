<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
    /**
     * Send a JSON response for any failed validation.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        Log::error('Usuario no registrado. Errores:');
        Log::error($validator->errors()->toArray());

        return parent::failedValidation($validator);
    }

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

        $response_data = $response->json()['data'];

        $this->merge([
            'altern_email' => Str::lower($this->CorreoAlterno ?? ''),
            'name' => $this->Nombres,
            'middlename' => $this->ApellidoP,
            'surname' => $this->ApellidoM,
            'email' => Str::lower($this->email),
            'nationality' => $this->Pais,
            'phone_number' => $this->Tel,
            'curp' => Str::upper($this->CURP ?? ''),
            'age' => $this->Edad,
            'residence' => $this->LugarResidencia,
            'gender' => $this->OtroGenero === null ? $this->Genero : $this->Genero.' - '.$this->OtroGenero,
            'ethnicity' => $this->GEtnico,

        ]);


        # Guarda los datos recuperados del directorio activo en la solicitud.
        if ($response->successful())
        {
            $response_data = $response->json()['data'];

            $this->merge([
                'CURP' => $this->CURP !== null ? Str::upper($this->CURP) : null,
                'DirectorioActivo' => $response_data['DirectorioActivo'],
                'ClaveUASLP' => $response_data['ClaveUASLP'],
                'email' => Str::lower($this->email),
                'Nombres' => Str::upper($response_data['name']),
                'ApellidoP' => Str::upper($response_data['first_surname']),
                'ApellidoM' => $response_data['last_surname'] !== null ? Str::upper($response_data['last_surname']) : null,
                'CorreoAlterno' => $this->CorreoAlterno !== null ? Str::lower($this->CorreoAlterno) : null,
            ]);
        }
        else
        {
            $this->merge([
                'CURP' => $this->CURP !== null ? Str::upper($this->CURP) : null,
                'email' => Str::lower($this->email),
                'Nombres' => Str::upper($this->Nombres),
                'ApellidoP' => Str::upper($this->ApellidoP),
                'ApellidoM' => $this->ApellidoM !== null ? Str::upper($this->ApellidoM) : null,
                'CorreoAlterno' => $this->CorreoAlterno !== null ? Str::lower($this->CorreoAlterno) : null,
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
            'ApellidoM' => [ 'nullable' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users,email' ],
            'password' => [ Rule::requiredIf($this->DirectorioActivo === null) ],
            'passwordR' => [ Rule::requiredIf($this->DirectorioActivo === null), 'same:password' ],
            'Pais' => [ 'required' ],
            'Tel' => [ 'required', 'numeric' ],
            'CURP' => [
                'nullable',
                'size:18',
                'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i',
                'unique:users,curp',
            ],
            'Edad' => ['required','numeric'],
            'LugarResidencia' => ['required'],
            'Genero' => ['required','in:Masculino,Femenino,Otro,NoEspecificar'],
            'OtroGenero' => ['nullable','required_if:Genero,Otro'],
            //'CorreoAlterno' => ['required'],
        ];
    }
}
