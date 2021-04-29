<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Response;

use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ReporteTipoTramiteController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }
    

    public function index()
    {
        
        return view('reporte.tipo-tramite.index');

    }

    public function imprimir($fecha_inicio, $fecha_fin, $tipo_tramite)
    {
       ///dd($Reportes);

      $Reportes = DB::select("SELECT d.id,d.num_recepcion,p.anio as indice, CASE WHEN so.nom_solicitante='noespecificada'  THEN '--' ELSE so.nom_solicitante END AS nom_solicitante, CASE WHEN so.dni_ruc IS NULL THEN '-- --' ELSE so.dni_ruc END AS dni_ruc, CASE WHEN so.cargo IS NULL THEN '--' ELSE so.cargo END AS cargo, d.tipo_tramite,
      CASE WHEN so.cor_solicitante IS NULL THEN '-- --' ELSE so.cor_solicitante END AS cor_solicitante,td.nombre_tipoDocumento,d.num_documento,DATE_FORMAT(d.fecha_recepcion, '%d/%m/%Y') AS fecha_recepcion,TIME_FORMAT(d.hora_recepcion, '%h:%i %p') AS hora_recepcion,d.asunto, d.detalle, CASE WHEN ep.nombre_empresa='noespecificada'  THEN '--' ELSE ep.nombre_empresa END AS nombre_empresa  FROM documentos d 
      INNER JOIN periodo p on d.periodo_id=p.id 
      LEFT JOIN solicitante so on d.solicitante_id=so.id
      INNER JOIN empresa ep on ep.id=d.empresa_id 
      INNER JOIN tipodocumento td on td.id=d.tipoDocumento_id where d.fecha_recepcion between '$fecha_inicio' and '$fecha_fin' and d.tipo_tramite='$tipo_tramite'");

   // dd($Reportes);
        
        $view = view('reporte.imprimir-tipo-tramite',['Reportes' => $Reportes]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');

        $pdf->loadHTML($view);
        
       return $pdf->download('reporte_Tipotramite.pdf');
    }
    
}
