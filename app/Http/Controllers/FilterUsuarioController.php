<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class FilterUsuarioController extends Controller
{
    public function index(Request $request){
        //dd($request->idArea);
        $usuarios = Usuario::where('area_id', $request->idArea)
            ->orderBy('nombres')
            ->get();

        return response()->json([
            'usuarios' => $usuarios
        ]);

       // dd($request->idArea);
    }
}
