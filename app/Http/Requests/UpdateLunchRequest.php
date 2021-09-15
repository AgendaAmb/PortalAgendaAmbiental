<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLunchRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        # Valida el campo del lunch.
        if ($this->lunch === 'true')
            $this->merge([ 'lunch' => true ]);
        else if ($this->lunch === 'false')
            $this->merge([ 'lunch' => false ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lunch' => ['required', 'boolean'],
            'idUsuario' => ['required']
        ];
    }
}
