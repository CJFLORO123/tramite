<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
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

        $empresas = DB::table('empresa')
                    ->select('empresa.id as id','empresa.nombre_empresa')
                    ->where('nombre_empresa','LIKE','%' .$buscarpor . '%')
                   ->orderBy('id','desc')
                   ->simplePaginate(10);
                   
        return view('organizacion.empresa.index', ['empresas' => $empresas,'buscarpor' => $buscarpor]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacion.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        Empresa::create([
            'nombre_empresa' => $request->nombre_empresa,
        ]);

        return redirect()->route('empresa.index');
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
        $empresa = Empresa::where('id', $id)
            ->first();
     
        return view('organizacion.empresa.editar', compact('empresa'));
        
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
        Empresa::find($id)
            ->update(['nombre_empresa' => $request->nombre_empresa]);

        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::where('id', $id)->delete();

        return redirect()->route('empresa.index');
    }
}
