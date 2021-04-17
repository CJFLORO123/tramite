<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Tipousuario;
use App\Models\Usuario;
use App\Models\TipoDocumento;
use App\Models\Area;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Documentos;

class EmitidosController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }  
   
    public function index(Request $request)
    {
        $buscarpor=$request->get('search');   
            
        $emitidos = DB::table('documentos')
        ->select('documentos.id as documento','documentos.num_recepcion as num_recepcion','periodo.anio as indice','tipodocumento.nombre_tipoDocumento AS nombre_tipoDocumento','documentos.asunto as asunto', 'situacion.id as situacion','usuario.nombres as nombre','usuario.apellidos as apellidos','area.nombre_area as area','documentos.num_documento as num_documento','situacion.desc_situacion', 
         DB::raw('CASE WHEN empresa.nombre_empresa="noespecificada" THEN "-" ELSE empresa.nombre_empresa END AS nombre_empresa'),		
         DB::raw('date_format(documentos.fecha_recepcion, "%d/%m/%Y") as fecha_recepcion'),
         DB::raw("time_format(documentos.hora_recepcion,'%h:%i %p') as  hora_recepcion"),
         )
        ->join('situacion','documentos.id', '=', 'situacion.documentos_id')
        ->join('periodo','periodo.id', '=', 'documentos.periodo_id')
        ->join('tipodocumento','tipodocumento.id', '=', 'documentos.tipoDocumento_id')
        ->join('usuario','documentos.usuario_id', '=', 'usuario.id')
        ->join('area','usuario.area_id', '=', 'area.id')
        ->join('empresa','empresa.id', '=', 'documentos.empresa_id')
        ->whereRaw('(situacion.usuario_id='.Auth::id().' and situacion.desc_situacion="EMITIDO")')
        ->where('num_documento','LIKE','%' .$buscarpor . '%')
        ->orderBy('documento','desc')
        ->simplePaginate(6);
 // dd($derivados);
        return view('documentos.emitidos.index',['emitidos' => $emitidos,'buscarpor' => $buscarpor]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
