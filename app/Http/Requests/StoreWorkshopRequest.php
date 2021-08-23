<?php

namespace App\Http\Requests;

use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkshopRequest extends FormRequest
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
            'CP' => ['required'],
            'Ocupacion' => ['required'],
            'LugarResidencia' => ['required'],
            'isDiscapacidad' => ['required','in:Si,No'],
            'Discapacidad' => ['required_if:isDiscapacidad,Si'],
            'isAsistencia' => ['required','in:Si,No'],
            'CursosC' => ['required_if:isAsistencia,Si'],
            'InteresAsistencia' => ['required','in:Si,No'],
        ];
    }
}
