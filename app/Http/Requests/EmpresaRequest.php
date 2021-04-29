<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nombre_empresa' => 'required|unique:empresa,nombre_empresa',
        ];
    }

    public function messages()
    {
    return [
        'nombre_empresa.unique' => 'Error! Empresa Registrada',
        
       ];
   }


}
