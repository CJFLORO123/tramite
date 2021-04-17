<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remitente;

class ObtenerRemitenteController extends Controller
{
    public function index(Request $request){

        $term = $request->term;	

        $querys = Remitente::where('nom_solicitante','like', '%' . $term . '%')->get();

        $data =[];

        foreach ($querys as $query){

            $data[] = [
               'solicitante' => $query->nom_solicitante
            ];
        }

        return $data;
    }
}
