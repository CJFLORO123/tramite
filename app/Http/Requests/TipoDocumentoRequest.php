<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoDocumentoRequest extends FormRequest
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
            'nombre_tipoDocumento' => 'required|unique:tipodocumento,nombre_tipoDocumento',
        ];
    }

    public function messages()
    {
    return [
        'nombre_tipoDocumento.unique' => 'Error! Nombre Tipo Documento Registrado',
        
        
       ];
   }
}
