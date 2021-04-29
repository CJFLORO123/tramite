<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemitenteRequest extends FormRequest
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
            'nom_solicitante' => 'required|unique:solicitante,nom_solicitante',
           
        ];
    }

    public function messages()
    {
    return [
        'nom_solicitante.unique' => 'Error! Remitente Nombre y Apellido Registrado',
        
        
       ];
   }
}
