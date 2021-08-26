<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
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
                'errors' => $validator->errors()->toArray()
            ],

            # Código de error
            $code
        ));
    }
}
