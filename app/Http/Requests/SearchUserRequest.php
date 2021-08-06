<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class SearchUserRequest extends FormRequest
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
        $code = JsonResponse::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException(

            # Respuesta de error
            response()->json([
                'code' => $code,
                'errors' => $validator->errors()->toArray()
            ],

            # Código de error
            $code
        ));
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
