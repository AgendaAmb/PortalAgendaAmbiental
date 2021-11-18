<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsersModuleRequest extends FormRequest
{
    use JsonResponseTrait;

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
            'users.*.module_id' => ['required','exists:modules,id'],
            'users.*.user_id' => [ 'required','numeric','exists:users,id' ],
            'users.*.user_type' => [ 'required', 'in:externs,students,workers']
        ];
    }
}
