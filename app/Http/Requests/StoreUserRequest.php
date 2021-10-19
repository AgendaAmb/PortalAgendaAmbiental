<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $curp_pattern = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';

        return [
            'module_id' => ['required', 'exists:modules,id'],
            'pertenece_uaslp' => ['required', 'boolean'],
            'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'numeric'],
            'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'in:ALUMNOS,UASLP', 'string'],
            'email' => [ 'required', 'unique:users,email', 'string', 'email', 'max:255' ],
            'altern_email' => [ 'required', 'different:email', 'string', 'email', 'max:255' ],
            'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'string', 'max:255'],
            'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'same:password','string', 'max:255'],
            'curp' => ['nullable', 'required_if:no_curp,false', 'unique:users,curp', 'size:18', $curp_pattern,],
            'name' => ['required', 'string', 'max:255' ],
            'middlename' => ['required','string','max:255'],
            'surname' => ['nullable'],
            'birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
            'ocupation' => ['required', 'string', 'max:255'],
            'gender' => [ 'required', 'string', 'in:Masculino,Femenino,No especificar,Otro' ],
            'other_gender' => ['nullable','required_if:gender,Otro'],
            'nationality' => ['required','string','max:255'],
            'residence' => ['required','string','max:255'],
            'zip_code' => ['required', 'numeric'],
            'phone_number' => ['required','numeric'],
            'is_disabled' => ['required', 'boolean'],
            'ethnicity' => ['nullable','string','max:255'],
            'disability' => ['nullable','required_if:is_disabled,true']
        ];
    }
}
