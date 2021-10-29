<?php

namespace App\Http\Requests;

use App\Exceptions\RegisterException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Errores del nombre
            'Nombres.required' => 'El nombre del usuario es requerido',
            'Nombres.max' => 'La longitud del nombre es demasiado larga',

            // Errores del apellido paterno
            'ApellidoP.required' => 'El apellido paterno es requerido',
            'ApellidoP.max' => 'La longitud del apellido paterno es demasiado larga',

            // Errores del apellido materno
            'ApellidoM.max' => 'La longitud del apellido materno es demasiado larga',

            // Errores de la edad.
            'Edad.required' => 'La edad es requerida',
            'Edad.numeric' => 'La edad debe ser numérica',

            // Errores del país de nacimiento.
            'Pais.required' => 'El Pais de nacimiento es requerido',

            // Errores del lugar de residencia
            'LugarResidencia.required' => 'El lugar de residencia es requerido',

            // Errores del género
            'Genero.required' => 'El género es requerido',
            'Genero.in' => 'El género especificado no es válido',

            // Errores para el otro género
            'OtroGenero.required_if' => 'Especificá qué otro género',

            // Errores del curp.
            'CURP.unique' => 'Este curp ya está registrado en el sistema',
            'CURP.regex' => 'El formato de tu curp no es válido',

            // Errores del email.
            'email.required' => 'El correo electrónico es requerido',
            'email.unique' => 'Este correo electrónico ya está registrado en el sistema',

            // Contraseña
            'password.required' => 'La contraseña es requerida',

            // Verificación de la contraseña.
            'passwordR.required' => 'La confirmación de la contraseña es requerida',
            'passwordR.same' => 'Las contraseñas no coinciden',

            // Teléfono de contacto.
            'Tel.required' => 'El número de teléfono es requerido',
            'Tel.numeric' => 'El número de teléfono debe de ser numérico',
        ];
    }

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
        $messages = collect([
            'Error '.JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
            'Tu registro no pudo ser completado exitosamente por los siguientes motivos:'
        ]);

        # Obtiene los errores y los devuelve como arreglo.
        $errors = array_values($validator->errors()->toArray());
        $errors = collect($errors)->map(fn($error) => $error[0]);
        $errors = $messages->merge($errors)->toArray();

        throw new RegisterException($this->all(), $errors);
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

        # Guarda los datos recuperados del directorio activo en la solicitud.
        if ($response->successful())
        {
            $response_data = $response->json()['data'];

            $this->merge([
                'CURP' => $this->CURP !== null ? Str::upper($this->CURP) : null,
                'DirectorioActivo' => $response_data['DirectorioActivo'] ?? 'ALUMNOS',
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
