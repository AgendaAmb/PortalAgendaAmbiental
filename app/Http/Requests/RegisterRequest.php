<?php

namespace App\Http\Requests;

use App\Models\Auth\Extern;
use App\Rules\UserNotRegistered;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
    /**
     * Regex del curp
     * 
     * @var string
     */
    private const CURP_REGEX = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';

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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'curp.unique' => 'El curp ya fue registrado previamente.',
            'curp.regex' => 'El curp contiene una estructura incorrecta.',
            'email.email' => 'El correo electrónico contiene una estructura incorrecta.',
            'email.unique' => 'Este correo electrónico ya fue registrado previamente.'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        # Fusiona el id para los externos y convierte a mayúsculas 
        # o minúsculas algunos campos.
        $this->merge([
            'id' => Extern::withTrashed()->where('type', 'externs')->latest()->value('id') + 1 ?? 1,
            'type' => 'externs',
            'altern_email' => Str::lower($this->altern_email ?? ''),
            'email' => Str::lower($this->email ?? ''),
            'curp' => Str::upper($this->curp ?? ''),
            'gender' => $this->other_gender === null ? $this->gender : $this->gender.' - '.$this->other_gender,
        ]);

        # Valida el correo de la uaslp.
        $response = Http::post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', ['username' => $this->email]);

        # Usuario no encontrado.
        if ($response->failed())
            return;

        $response_data = $response->json()['data'];
        $this->merge([
            'id' => $response_data['ClaveUASLP'],
            'name' => Str::upper($response_data['name']),
            'middlename' => Str::upper($response_data['first_surname']),
            'surname' => $response_data['last_surname'] !== null ? Str::upper($response_data['last_surname']) : null,
            'dependency' => $response_data['dependencia'] ?? null,
        ]);


        # Determina el tipo de usuario, en base al directorio activo.
        if ($response_data['DirectorioActivo'] === 'ALUMNOS')
            $this->merge(['type'=>'students']);
        else if ($response_data['DirectorioActivo'] === 'UASLP')
            $this->merge(['type'=>'workers']);
        else if (Str::contains($this->email, '@alumnos.uaslp.mx'))
            $this->merge(['type'=>'students']);
        else if (Str::contains($this->email, '@uaslp.mx'))
            $this->merge(['type'=>'workers']);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required',new UserNotRegistered($this->type) ],
            'type' => ['required','string','in:workers,students,externs'],
            'dependency' => ['nullable', 'required_unless:type,externs'],
            'altern_email' => ['nullable', 'string','email','different:email'],
            'name' => [ 'required', 'string', 'max:255' ],
            'middlename' => [ 'required', 'string', 'max:255' ],
            'surname' => [ 'nullable' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users,email' ],
            'password' => [ 'nullable', 'required_if:type,externs', 'same:passwordR' ],
            'nationality' => [ 'required', 'string' ],
            'phone_number' => [ 'required', 'numeric' ],
            'curp' => ['nullable','size:18','unique:users,curp', self::CURP_REGEX],
            'birth_date' => ['required','date'],
            'residence' => ['required','string'],
            'gender' => ['required','string'],
            'disability' => ['nullable','required_if:isDiscapacidad,Si','string'],
            'ethnicity' => ['nullable','string'],
        ];
    }
}
