<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remitente;

class RemitenteController extends Controller
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
        $remitentes = Remitente::orderBy('nom_solicitante')
            ->orderBy('nom_solicitante')
            ->simplePaginate(11);

        return view('organizacion.remitente.index', compact('remitentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacion.remitente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Remitente::create([
            'nom_solicitante' => $request->nom_solicitante,
            'cargo' => $request->cargo,
            'dni_ruc' => $request->dni_ruc,
            'cor_solicitante' => $request->cor_solicitante,
        ]);

        return redirect()->route('remitente.index');
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
        $remitente = Remitente::where('id', $id)
        ->first();
 
    return view('organizacion.remitente.editar', compact('remitente'));
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
        Remitente::find($id)
            ->update([
                'nom_solicitante' => $request->nom_solicitante,
                'cargo' => $request->cargo,
                'dni_ruc' => $request->dni_ruc,
                'cor_solicitante' => $request->cor_solicitante]);

        return redirect()->route('remitente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Remitente::where('id', $id)->delete();

        return redirect()->route('remitente.index');
    }
}
