<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\TipoUsuario;
use App\Models\Usuario;
use App\Models\TipoDocumento;
use App\Models\Area;
use App\Models\Empresa;
use App\Models\Controldocumentos;
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
        
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        $id_emitidos = DB::select("SELECT d.id,d.num_recepcion,p.anio,td.nombre_tipoDocumento,d.num_documento,DATE_FORMAT(d.fecha_recepcion, '%d/%m/%Y') AS fecha_recepcion,TIME_FORMAT(d.hora_recepcion, '%h:%i %p') AS hora_recepcion,d.asunto, d.detalle,d.adj_documento, u.nombres,u.apellidos, a.nombre_area, ep.nombre_empresa 
       FROM documentos d 
       inner join periodo p on d.periodo_id=p.id 
       INNER JOIN tipodocumento td on td.id=d.tipoDocumento_id
       INNER JOIN usuario u on u.id=d.usuario_id
       INNER JOIN area a on a.id=u.area_id
       INNER JOIN empresa ep on ep.id=d.empresa_id
       where d.id=".$id);

        return view('documentos.emitidos.detalle-emitidos', compact('id_emitidos'));
    }

  
    public function edit($id)
    {
        $now = Carbon::now();

        $areas = Area::orderBy('nombre_area')
        ->get();

        $usuarios = Usuario::orderBy('nombres')
        ->get();

        $periodo = periodo::orderBy('anio')
        ->get();

        $tipodocumentos = TipoDocumento::orderBy('nombre_tipoDocumento')
        ->get();

        $tiposUsuarios = TipoUsuario::orderBy('descripcion')
        ->get();

        $sql = "SELECT MAX(d.num_recepcion) as num_recepcion from documentos d INNER JOIN periodo p on p.id=d.periodo_id WHERE p.estado";
        $r = DB::select($sql);

        $numExpediente=  $r[0]->num_recepcion + 1;    

        $emitidos = Documentos::where('id', $id)
            ->first();

        return view('documentos.emitidos.edit', compact('emitidos', 'numExpediente','periodo','now','areas','tipodocumentos','tiposUsuarios','usuarios'));
    }

    public function update(Request $request, $id)
    {
        $empresa_id = DB::table('empresa')
                ->where('nombre_empresa', $request->empresa)
                ->select('id')
                ->get();
        
        $tidocumento=DB::select("SELECT id FROM control_documentos
                     WHERE tipoDocumento_id =$request->tipoDocumento_id and tipo_tramite='emitidos'");
        
        $fecha = Carbon::createFromFormat('d/m/Y',$request->fecha_recepcion)->format('Y-m-d');
        $time = Carbon::parse($request->hora_recepcion)->format('H:i:s');
       
        Documentos::find($id)
        ->update([
            'tipoDocumento_id' => $request->tipoDocumento_id,
            'num_documento'    => $request->num_documento,
            'fecha_recepcion'  => $fecha,
            'hora_recepcion'   => $time,
            'asunto' => $request->asunto,
            'detalle' => $request->detalle,
            'empresa_id' => $empresa_id[0]->id,
            'usuario_id' => $request->usuario_id,
            
        ]);

        Controldocumentos::where('id', $tidocumento[0]->id)
                  ->update([
                      'fecha_registro' => $fecha,
                   ]);

        return redirect()->route('emitidos.index');
    }

  
    public function destroy($id)
    {
        //
    }
}
