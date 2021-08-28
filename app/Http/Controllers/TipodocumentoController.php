<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

use App\Http\Requests\TipoDocumentoRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Controldocumentos;

class TipodocumentoController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $buscarpor=$request->get('search');

        $tipodocumentos = DB::table('tipodocumento')
                        ->select('tipodocumento.id as id','tipodocumento.nombre_tipoDocumento')
                        ->where('nombre_tipoDocumento','LIKE','%' .$buscarpor . '%')
                        ->orderBy('id','desc')
                        ->simplePaginate(10);  
                        
        return view('documentos.tipo-documento.index', ['tipodocumentos' => $tipodocumentos,'buscarpor' => $buscarpor]);
                     
    }

    
    public function create()
    {
        return view('documentos.tipo-documento.create');
    }

    
    public function store(TipoDocumentoRequest $request)
    {
        $tipo = TipoDocumento::create([
            'nombre_tipoDocumento' => $request->nombre_tipoDocumento,
        ]);
   // dd($tipo->id); 

        $tipoDocumento_id=$tipo->id;

        Controldocumentos::create([
            'num_documentos' => 0,
            'tipo_tramite' => 'EMITIDOS',
            'tipoDocumento_id' => $tipoDocumento_id,
            'fecha_registro' => date("Y-m-d"),
        ]);

        return redirect()->route('tipo-documentos.index');

    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $tipodocumento = TipoDocumento::where('id', $id)
            ->first();

        return view('documentos.tipo-documento.editar',compact('tipodocumento'));
    }

    
    public function update(Request $request, $id)
    {
        TipoDocumento::find($id)
            ->update(['nombre_tipoDocumento' => $request->nombre_tipoDocumento]);

            return redirect()->route('tipo-documentos.index');
    }

    
    public function destroy($id)
    {
        TipoDocumento::where('id', $id)->delete();

        return redirect()->route('tipo-documentos.index');
    }
}
