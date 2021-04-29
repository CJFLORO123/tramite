<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remitente;

class ObtenerRemitenteController extends Controller
{
    public function index(Request $request){

        $term = $request->get('term');	

        $querys = Remitente::where('nom_solicitante','LIKE', '%' . $term . '%')->get();

        $data =[];

        foreach ($querys as $query){

            $data[] = [
               'label' => $query->nom_solicitante
            ];
        }

        return $data;
    }
}
