<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaResquest extends FormRequest
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
        return [
            'nombre_area' => 'required|string',

        ];
    }

    public function messages()
    {
    return [
        'nombre_area.unique' => 'Error! Area Registrada',

    ];
   }

}
