<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Remitente;
use App\Http\Requests\RemitenteRequest;
use Illuminate\Support\Facades\DB;

class RemitenteController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }
  
    public function index(Request $request)
    {
        
        $buscarpor=$request->get('search');

        $remitentes = DB::table('solicitante')
                   ->select('solicitante.id as id','solicitante.nom_solicitante','solicitante.cargo','dni_ruc','solicitante.cor_solicitante')
                   ->where('nom_solicitante','LIKE','%' .$buscarpor . '%')
                   ->orderBy('id','desc')
                   ->simplePaginate(10);
      
        //dd($buscarpor);
        return view('organizacion.remitente.index', ['remitentes' => $remitentes,'buscarpor' => $buscarpor]);
     
    }

  
    public function create()
    {
        return view('organizacion.remitente.create');
    }

    
    public function store(RemitenteRequest $request)
    {
        Remitente::create([
            'nom_solicitante' => $request->nom_solicitante,
            'cargo' => $request->cargo,
            'dni_ruc' => $request->dni_ruc,
            'cor_solicitante' => $request->cor_solicitante,
        ]);

        return redirect()->route('remitente.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $remitente = Remitente::where('id', $id)
        ->first();
 
    return view('organizacion.remitente.editar', compact('remitente'));
    }

  
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

    
    public function destroy($id)
    {
        Remitente::where('id', $id)->delete();

        return redirect()->route('remitente.index');
    }
}
