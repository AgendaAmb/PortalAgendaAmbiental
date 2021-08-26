<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class SearchUserRequest extends FormRequest
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
            'search_key' => [ 'required', 'in:email,id' ],
            'search_value' => [ 'required', 'string'],
            'user_type' => [ 'required', 'in:students,workers,externs,*'],
        ];
    }
}
