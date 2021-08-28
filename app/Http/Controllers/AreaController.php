<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaResquest;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Area;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $buscarpor=$request->get('search');

        $areas = DB::table('area')
            ->select('area.id as id','area.nombre_area')
            ->where('nombre_area','LIKE','%' .$buscarpor . '%')
            ->orderBy('id','desc')
            ->simplePaginate(10);

        return view('organizacion.areas.index', ['areas'=> $areas,'buscarpor' => $buscarpor]);
    }

   
    public function create()
    {
        return view('organizacion.areas.create');
    }

  
    public function store(AreaResquest $request)
    {
        Area::create([
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
    
     $usuario = Usuario::find(1);

    
   
    $hasTask = Area::has('usuario.area_id')->get();
    dd($hasTask);

    if($hasTask){
        return 'hola joven';
    }else{
        return 'false';
    }
 


     return redirect()->route('area.index');

    }
        
}
       

    

