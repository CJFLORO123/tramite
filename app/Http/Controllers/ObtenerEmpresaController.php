<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class ObtenerEmpresaController extends Controller
{
    public function index(Request $request){

        $term = $request->get('term');	

        $querys = Empresa::where('nombre_empresa','LIKE', '%' . $term . '%')->get();

        $data =[];

        foreach ($querys as $query){

            $data[] = [
               'label' => $query->nombre_empresa
            ];
        }

        return $data;
    }
}
