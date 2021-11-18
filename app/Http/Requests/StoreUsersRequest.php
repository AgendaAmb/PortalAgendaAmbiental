<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'users.*.module_id' => ['required', 'exists:modules,id'],
            'users.*.pertenece_uaslp' => ['required', 'boolean'],
            'users.*.clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'numeric'],
            'users.*.directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'in:ALUMNOS,UASLP', 'string'],
            'users.*.email' => [ 'required', 'unique:users,email', 'string', 'email', 'max:255' ],
            'users.*.altern_email' => [ 'required', 'different:email', 'string', 'email', 'max:255' ],
            'users.*.password' => ['nullable', 'required_if:pertenece_uaslp,false', 'string', 'max:255'],
            'users.*.rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'string', 'max:255'],
            'users.*.curp' => ['nullable', 'required_if:no_curp,false', 'unique:users,curp', 'size:18', $curp_pattern,],
            'users.*.name' => ['required', 'string', 'max:255' ],
            'users.*.middlename' => ['required','string','max:255'],
            'users.*.surname' => ['nullable'],
            'users.*.birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
            'users.*.ocupation' => ['required', 'string', 'max:255'],
            'users.*.gender' => [ 'required', 'string', 'in:Masculino,Femenino,No especificar,Otro' ],
            'users.*.other_gender' => ['nullable','required_if:gender,Otro'],
            'users.*.nationality' => ['required','string','max:255'],
            'users.*.residence' => ['required','string','max:255'],
            'users.*.zip_code' => ['required', 'numeric'],
            'users.*.phone_number' => ['required','numeric'],
            'users.*.is_disabled' => ['required', 'boolean'],
            'users.*.ethnicity' => ['nullable','string','max:255'],
            'users.*.disability' => ['nullable','required_if:is_disabled,true']
        ];
    }
}
