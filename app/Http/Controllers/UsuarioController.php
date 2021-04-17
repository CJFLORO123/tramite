<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoUsuario;
use App\Models\Privilegio;

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
    public function index()
    {
        $usuarios = Usuario::orderBy('apellidos')
            ->orderBy('nombres')
            ->simplePaginate(5);

        return view('seguridad.usuarios.index', compact('usuarios'));
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
    public function store(Request $request)
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
