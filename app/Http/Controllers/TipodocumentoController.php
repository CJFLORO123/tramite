<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;


class TipodocumentoController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodocumentos = TipoDocumento::orderBy('nombre_tipoDocumento')
            ->orderBy('nombre_tipoDocumento')
            ->simplePaginate(11);

        return view('documentos.tipo-documento.index', compact('tipodocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos.tipo-documento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoDocumento::create([
            'nombre_tipoDocumento' => $request->nombre_tipoDocumento,
        ]);

        return redirect()->route('tipo-documentos.index');

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
        $tipodocumento = TipoDocumento::where('id', $id)
            ->first();

        return view('documentos.tipo-documento.editar',compact('tipodocumento'));
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
        TipoDocumento::find($id)
            ->update(['nombre_tipoDocumento' => $request->nombre_tipoDocumento]);

            return redirect()->route('tipo-documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDocumento::where('id', $id)->delete();

        return redirect()->route('tipo-documentos.index');
    }
}
