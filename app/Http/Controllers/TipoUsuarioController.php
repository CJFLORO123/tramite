<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TipoUsuarioRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\TipoUsuario;

class TipoUsuarioController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $buscarpor=$request->get('search');

        $TipoUsuarios = DB::table('tipo_usuario')
            ->select('tipo_usuario.id as id','tipo_usuario.descripcion')
            ->where('descripcion','LIKE','%' .$buscarpor . '%')
            ->orderBy('id','desc')
            ->simplePaginate(10);

        return view('seguridad.tipo-usuario.index', ['TipoUsuarios'=> $TipoUsuarios,'buscarpor' => $buscarpor]);

    }

   
    public function create()
    {
        $menus = Menu::where('padre', '0')
                ->orderBy('orden')
                ->get()
                ->toArray();

        for($i=0; $i<count($menus); $i++){
            $submenu = $this->getSubmenu($menus[$i]);
            $menuAll[$i] = array_merge($menus[$i], ['submenu' => $submenu]);
        }

        return view('seguridad.tipo-usuario.create', compact('menuAll'));
    }

    public function store(TipoUsuarioRequest $request)
    {
        $accesos = $request->submenu;
        $accesos = implode(',', $accesos);

        Tipousuario::create([
            'descripcion'   => $request->descripcion,
            'accesos'       => $accesos
        ]);

        return redirect()->route('tipo-usuario.index')->with('status', 'Tipo de usuario creado con exito');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
    
    $tipo = Tipousuario::where('id', $id)
        ->first();

    $menus = Menu::where('padre', '0')
        ->orderBy('orden')
        ->get()
        ->toArray();

    for($i=0; $i<count($menus); $i++){
        $submenu = $this->getSubmenu($menus[$i]);
        $menuAll[$i] = array_merge($menus[$i], ['submenu' => $submenu]);
    }

        return view('seguridad.tipo-usuario.editar',compact('tipo', 'menuAll'));
    }

    
    public function update(Request $request, $id)
    {
        $accesos = $request->submenu;
        $accesos = implode(',', $accesos);

        Tipousuario::find($id)
            ->update([
                'descripcion' => $request->descripcion,
                'accesos'     => $accesos
            ]);

        return redirect()->route('tipo-usuario.index');
    }

    
    public function destroy($id)
    {
        //
    }

    public function getSubmenu($menu){
        $submenu = Menu::where('padre', $menu['id'])
            ->orderBy('orden')
            ->get()
            ->toArray();

        return $submenu;
    }
}
