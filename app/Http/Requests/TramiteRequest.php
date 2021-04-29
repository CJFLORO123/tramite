<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TramiteRequest extends FormRequest
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
            'num_documento' => 'required|unique:documentos,num_documento',
        ];
    }

    public function messages()
    {
    return [
        'num_documento.unique' => 'Error! N° De Documento Registrada',
        
       ];
   }
}
