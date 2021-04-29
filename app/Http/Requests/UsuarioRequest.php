<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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

    
    public function rules()
    {
        return [
            'nombres' => 'required|unique:usuario,nombres',
            'apellidos' => 'required|unique:usuario,apellidos',
        ];
    }

    public function messages()
    {
    return [
        'nombres.unique' => 'Error! Nombres Registrado',
        'apellidos.unique' => 'Error! Apellido Registrado',
    
       ];
   }
}
