<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $areas = Area::orderBy('nombre_area')
            ->orderBy('nombre_area')
            ->simplePaginate(11);

        return view('organizacion.areas.index', compact('areas'));
    }

   
    public function create()
    {
        return view('organizacion.areas.create');
    }

  
    public function store(Request $request)
    {
        area::create([
            'nombre_area' => $request->nombre_area,
        ]);

        return redirect()->route('area.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $area = Area::where('id', $id)
            ->first();

        return view('organizacion.areas.editar',compact('area'));
    }

    public function update(Request $request, $id)
    {
        area::find($id)
            ->update(['nombre_area' => $request->nombre_area]);

        return redirect()->route('area.index');
    }

   
    public function destroy($id)
    {
        area::where('id', $id)->delete();

        return redirect()->route('tipo-documentos.index');
    }
}
