<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoDocumento;
use App\Models\Documentos;
use App\Models\Situacion;
use App\Models\Periodo;
use App\Models\Controldocumentos;
use App\Models\Solicitante;
use App\Models\Tipousuario;

use App\Http\Requests\UsuarioRequest;
use App\Models\Privilegios;

use App\Models\Usuario;
use App\Models\Area;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TramiteController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('search');
               
        $proceso = DB::table('documentos')
             ->select('documentos.id as documento','documentos.num_recepcion as num_recepcion','periodo.anio as indice','tipodocumento.nombre_tipoDocumento AS nombre_tipoDocumento', 'situacion.id as situacion', 'documentos.asunto as asunto','documentos.num_documento as num_documento','situacion.desc_situacion',
              DB::raw('CASE WHEN solicitante.nom_solicitante="noespecificada" THEN "-" ELSE solicitante.nom_solicitante END AS nom_solicitante'),
              DB::raw('date_format(documentos.fecha_recepcion, "%d/%m/%Y") as fecha_recepcion'),
              DB::raw("time_format(documentos.hora_recepcion, '%h:%i %p') as  hora_recepcion"),
              )
             ->join('periodo','periodo.id', '=', 'documentos.periodo_id')
             ->join('solicitante','solicitante.id', '=', 'documentos.solicitante_id')
             ->join('tipodocumento','tipodocumento.id', '=', 'documentos.tipoDocumento_id')
             ->join('situacion','documentos.id', '=', 'situacion.documentos_id')
             ->whereRaw('(situacion.usuario_id='.Auth::id().' and situacion.desc_situacion="RECIBIDO")')
             ->where('num_documento','LIKE','%' .$buscarpor . '%')
             ->orderBy('documento','desc')
             ->simplePaginate(20);
             //dd( $documentos);
        return view('documentos.tramite.index',['proceso' => $proceso,'buscarpor' => $buscarpor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        
        $areas = Area::orderBy('nombre_area')
        ->get();

        $periodo = Periodo::orderBy('anio')
        ->get();

        $sql = "SELECT MAX(d.num_recepcion) as num_recepcion from documentos d INNER JOIN periodo p on p.id=d.periodo_id WHERE p.estado";
        $r = DB::select($sql);

        $numExpediente=  $r[0]->num_recepcion + 1;

        $tipodocumentos = TipoDocumento::orderBy('nombre_tipoDocumento')
        ->get();

        $tiposUsuarios = Tipousuario::orderBy('descripcion')
        ->get();

        return view('documentos.tramite.create',compact('tipodocumentos', 'areas','now', 'numExpediente','periodo','tiposUsuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_tramite = $request->tipo_tramite;
        if($tipo_tramite == 'RECIBIDOS')
        {

         $sql = "SELECT MAX(cd.num_documentos) as num_documentos , id FROM control_documentos cd WHERE cd.tipoDocumento_id = $request->tipoDocumento_id AND cd.tipo_tramite ='$request->tipo_tramite' GROUP BY id"; 

         $idControl=DB::select("SELECT id FROM control_documentos WHERE tipoDocumento_id = $request->tipoDocumento_id  and tipo_tramite='$request->tipo_tramite'");

         $solicitante=DB::select("SELECT i.id FROM solicitante i WHERE i.id=32");

         $empresaid=DB::select("SELECT i.id FROM empresa i WHERE i.id=7");

         $r  = DB::select($sql);

         $correlativo = $r[0]->num_documentos + 1;

           if($request->file('adj_documento'))
             {
               $docRel = $request->file('adj_documento')->store('indice', 'public'); 
             }else{
                 $docRel = null;
             }

             $solicitante_id = DB::table('solicitante')
             ->where('nom_solicitante', $request->solicitante)
             ->select('id')
             ->get();
            

             if($request->solicitante){
                 $solicita = $solicitante_id[0]->id;
             }else{
                 $solicita = $solicitante[0]->id;
             } 

             $fecha = Carbon::createFromFormat('d/m/Y',$request->fecha_recepcion)->format('Y-m-d');

             //$hora = Carbon::createFromTime($request->hora_recepcion)->format('HH:mm:ss');
             //$newDate = date("Y-m-d", strtotime(["fechai"]));
             $time = Carbon::parse($request->hora_recepcion)->format('H:i:s');

             //dd($time);

             Documentos::create([
                 'num_recepcion'    => $correlativo,
                 'periodo_id'       => 2,
                 'fecha_recepcion'  => $fecha,
                 'hora_recepcion'   => $time,
                 'solicitante_id'   => $solicita,
                 'tipoDocumento_id' => $request->tipoDocumento_id,
                 'num_documento'    => $request->num_documento,
                 'asunto'           => $request->asunto,
                 'detalle'          => $request->detalle,
                 'usuario_id'       => Auth::id(),
                 'empresa_id'       => $empresaid[0]->id,
                 'adj_documento'    => $docRel,
                 'tipo_tramite'     => $request->tipo_tramite,
                 
             ]);

             
             $documento_id = "SELECT MAX(d.id) as id from documentos d INNER JOIN usuario p
             on p.id=d.usuario_id WHERE p.id=" . Auth::id();

             $r = DB::select($documento_id);

             $documento = $r[0]->id;

             $r = DB::table('situacion')->insert([
                 'usuario_id'     => Auth::id(),
                 'desc_situacion' => 'RECIBIDO',
                 'fecha_ingreso'  => $fecha,
                 'documentos_id'   => $documento,
             ]);

             
             $r = Controldocumentos::where('id', $idControl[0]->id)
                  ->update([
                      'num_documentos' => $correlativo,
                      'fecha_registro' => $fecha,
                   ]);
           

        }else{
            
         $sql = "SELECT MAX(cd.num_documentos) as num_documentos FROM control_documentos cd WHERE cd.tipoDocumento_id = $request->tipoDocumento_id AND cd.tipo_tramite ='$request->tipo_tramite'";

         $idControl=DB::select("SELECT id FROM control_documentos WHERE tipoDocumento_id = $request->tipoDocumento_id  and tipo_tramite='$request->tipo_tramite'");

         $solicitante=DB::select("SELECT i.id FROM solicitante i WHERE i.id=32");

         $empresaid=DB::select("SELECT i.id FROM empresa i WHERE i.id=7");

         //dd($idControl[0]->id);

         $r = DB::select($sql);

         $correlativo = $r[0]->num_documentos + 1;

         $empresa_id = DB::table('empresa')
             ->where('nombre_empresa', $request->empresa)
             ->select('id')
             ->get();
            

             if($request->empresa){
                 $empresa = $empresa_id[0]->id;
             }else{
                 $empresa = $empresaid[0]->id;
             }
             
             $fecha = Carbon::createFromFormat( 'd/m/Y',$request->fecha_recepcion)->format('Y-m-d');

                     Documentos::create([
                         'num_recepcion'    => $correlativo,
                         'periodo_id'       => 2,
                         'fecha_recepcion'  => $fecha,
                         'hora_recepcion'   => date('H:i:s'),
                         'solicitante_id'   => $solicitante[0]->id,
                         'tipoDocumento_id' => $request->tipoDocumento_id,
                         'num_documento'    => $request->num_documento,
                         'asunto'           => $request->asunto,
                         'detalle'          => $request->detalle,
                         'usuario_id'       => $request->usuario_id,
                         'empresa_id'       => $empresa,
                         'tipo_tramite'     => $request->tipo_tramite,
                     ]);

                     $documento = "SELECT MAX(d.id) as id from documentos d INNER JOIN usuario p
                     on p.id=d.usuario_id WHERE p.id=". $request->usuario_id;

                     $r = DB::select($documento);

                     $documento_id = $r[0]->id;

                     //$usuario_id= $request->usuario_id;

                     $r = DB::table('situacion')->insert([
                         'usuario_id'     => Auth::id(),
                         'desc_situacion' => 'EMITIDO',
                         'fecha_ingreso'  => $fecha,
                         'documentos_id'   => $documento_id,
                     ]);

                     
                     $r = Controldocumentos::where('id', $idControl[0]->id)
                                     ->update([
                                'num_documentos' => $correlativo,
                                'fecha_registro'   => $fecha,
                                 ]);
           
             }


             return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
