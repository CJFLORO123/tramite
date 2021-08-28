<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controldocumentos;
use App\Models\Documentos;
use Illuminate\Support\Facades\DB;

class TipoTramiteController extends Controller
{
    public function index(Request $request){

        $tipo_tramite = $request->tipo_tramite;
        if($tipo_tramite == 'EMITIDOS')
        {
     
        $Control = DB::table('control_documentos')
        ->select('control_documentos.id as id', 'tipodocumento.nombre_tipoDocumento as nombre_tipoDocumento','control_documentos.num_documentos as num_documentos')
        ->join('tipodocumento','tipodocumento.id', '=', 'control_documentos.tipoDocumento_id')
        ->where([
            ['control_documentos.tipoDocumento_id', '=', $request->tipoDocumento_id],
            ['control_documentos.tipo_tramite', '=', 'EMITIDOS']
      
            ])->get();
        
      //   dd($Control->nombre_tipoDocumento);

        return response()->json([
            
            'Control' => $Control
        ]);

        }else{
 
            $Con = DB::table('documentos')
            ->join('periodo','periodo.id', '=', 'documentos.periodo_id')
            ->where([
                ['tipo_tramite', '=', 'RECIBIDOS']
                ])->max('documentos.num_recepcion');

                return response()->json([
                    'Con' => $Con + 1
                ]);
            
        }

        
    }
}
