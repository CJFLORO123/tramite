<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Models\TipoUsuario;
use App\Models\Privilegio;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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

        $usuarios = DB::table('usuario')
           ->select('usuario.id as id','usuario.nombres','usuario.apellidos','usuario.nickname','tipo_usuario.descripcion')
           ->join('tipo_usuario','tipo_usuario.id','=','usuario.tipoUsuario_id')
           ->where('nombres','LIKE','%' .$buscarpor . '%')
           ->orderBy('id','desc')
           ->simplePaginate(10);

        return view('seguridad.usuarios.index', ['usuarios'=> $usuarios,'buscarpor' => $buscarpor]);    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipousuario::orderBy('descripcion')
            ->get();

        $areas = Area::orderBy('nombre_area')
            ->get();

        return view('seguridad.usuarios.create', compact('tipos','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = Usuario::create([
            'nombres'   => $request->nombres,
            'apellidos' => $request->apellidos,
            'nickname'  => $request->nickname,
            'password'  => $request->password,
            'tipoUsuario_id' => $request->tipoUsuario_id,
            'area_id' => $request->area_id
        ]);

    $tipos = Tipousuario::where('id', $request->tipoUsuario_id)
        ->first();

    $accesos = explode(',', $tipos->accesos);

    foreach($accesos as $acceso){
        Privilegio::create([
            'usuario_id' => $usuario->id,
            'menu_id' => $acceso 
        ]);
    }
    return redirect()->route('usuarios.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $usuario = Usuario::where('id', $id)
            ->first();

        $areas = Area::orderBy('nombre_area')
            ->get();

        $tipos = Tipousuario::orderBy('descripcion')
            ->get();

        return view('seguridad.usuarios.editar', compact('usuario', 'tipos','areas'));
    }

  
    public function update(Request $request, $id)
    {
        Usuario::find($id)
            ->update([
                'nombres'   => $request->nombres,
                'apellidos' => $request->apellidos,
                'correo'    => $request->correo,
                'area_id'    => $request->area_id,
                'tipoUsuario_id' => $request->tipoUsuario_id
            ]);
       
            Privilegio::where('usuario_id', $id)->delete();

            $tipos = Tipousuario::where('id', $request->tipoUsuario_id)
                ->first();
    
            $accesos = explode(',', $tipos->accesos);
    
            foreach($accesos as $acceso){
                Privilegio::create([
                    'usuario_id' => $id,
                    'menu_id' => $acceso 
                ]);
            }
            
            return redirect()->route('usuarios.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
