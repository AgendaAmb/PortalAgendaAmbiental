<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserModuleRequest extends FormRequest
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
            'user_id' => [ 'required','numeric' ],
            'user_type' => [ 'required', 'in:externs,students,workers']
        ];
    }
}
