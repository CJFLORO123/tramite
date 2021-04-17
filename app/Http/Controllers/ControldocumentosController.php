<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controldocumentos;
use Illuminate\Support\Facades\DB;

class ControldocumentosController extends Controller
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

        $Controldocumentos = DB::table('control_documentos')
        ->select('control_documentos.id as id','control_documentos.num_documentos as num_documentos','control_documentos.tipo_tramite','tipodocumento.nombre_tipoDocumento AS nombre_tipoDocumento',
                        DB::raw('date_format(control_documentos.fecha_registro, "%d/%m/%Y") as fecha_registro'),
                        )
                        ->join('tipodocumento','tipodocumento.id', '=', 'control_documentos.tipoDocumento_id')
                        ->where('nombre_tipoDocumento','LIKE','%' .$buscarpor . '%')
                        ->orderBy('id','desc')
                        ->simplePaginate(20);

        return view('organizacion.control-documentos.index',['Controldocumentos' => $Controldocumentos,'buscarpor' => $buscarpor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
