<?php
function nombreUsuario($nom, $ape){
    $tok1 = explode(' ', $nom);
    $tok2 = explode(' ', $ape);

    // NOMBRE DEL USUARIO
    if(count($tok1) > 1){
        if(strlen($tok1[0]) <= 3){
            $nom = $tok1[0] .' '. $tok1[1];
        } else{
            $nom = $tok1[0];
        }
    } else{
        $nom = $tok1[0];
    }

    // APELLIDOS DEL USUARIO
    if(count($tok2) > 1){
        if(strlen($tok2[0]) <= 3){
            $ape = $tok2[0] .' '. $tok2[1];
        } else{
            $ape = $tok2[0];
        }
    } else{
        $ape = $tok2[0];
    }

    return $nom .' '. $ape;
}

function accesos($id, $accesos){
    $array = explode(',', $accesos);

    return in_array($id, $array);
}

function nomMeses($nroMes){
    switch($nroMes){
        case 1:
            $mesCompleto = 'ENERO';
            $mesCorto = 'ENE';
            break;

        case 2:
            $mesCompleto = 'FEBRERO';
            $mesCorto = 'FEB';
            break;

        case 3:
            $mesCompleto = 'MARZO';
            $mesCorto = 'MAR';
            break;

        case 4:
            $mesCompleto = 'ABRIL';
            $mesCorto = 'ABR';
            break;

        case 5:
            $mesCompleto = 'MAYO';
            $mesCorto = 'MAY';
            break;

        case 6:
            $mesCompleto = 'JUNIO';
            $mesCorto = 'JUN';
            break;

        case 7:
            $mesCompleto = 'JULIO';
            $mesCorto = 'JUL';
            break;

        case 8:
            $mesCompleto = 'AGOSTO';
            $mesCorto = 'AGO';
            break;

        case 9:
            $mesCompleto = 'SEPTIEMBRE';
            $mesCorto = 'SEP';
            break;

        case 10:
            $mesCompleto = 'OCTUBRE';
            $mesCorto = 'OCT';
            break;

        case 11:
            $mesCompleto = 'NOVIEMBRE';
            $mesCorto = 'NOV';
            break;

        case 12:
            $mesCompleto = 'DICIEMBRE';
            $mesCorto = 'DIC';
            break;
    }

    return [
        'mesCompleto' => $mesCompleto,
        'mesCorto' => $mesCorto
    ];
}

function urlActual($url){
    $newArray = [];
    $token = explode('/', $url);

    if(count($token) > 2){
        for($i=0; $i<2; $i++){
            array_push($newArray, $token[$i]);
        }

        $resultado = implode('/', $newArray);
        return $resultado;
    }

    $resultado = implode('/', $token);
    return $resultado;
}