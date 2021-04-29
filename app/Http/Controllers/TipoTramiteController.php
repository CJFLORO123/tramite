<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controldocumentos;
use Illuminate\Support\Facades\DB;

class TipoTramiteController extends Controller
{
    public function index(Request $request){
     
        $Control = Controldocumentos::where([
            ['tipoDocumento_id', '=', $request->tipoDocumento_id],
            ['tipo_tramite', '=', $request->tipo_tramite]
            ])->max('num_documentos');
           

        return response()->json([
            'Control' => $Control + 1
        ]);

        
    }
}
