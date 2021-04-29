<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Documentos extends Model
{
    protected $table = 'documentos';
    public $timestamps = false;

    protected $fillable = [
        'num_recepcion', 'fecha_recepcion', 'hora_recepcion', 'num_documento', 'asunto','detalle', 'adj_documento','tipoDocumento_id','periodo_id','solicitante_id','usuario_id','empresa_id','tipo_tramite'
    ];

    public function tipodocumento(){
        return $this->belongsTo(tipoDocumento::class, 'tipoDocumento_id', 'id');
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class, 'periodo_id', 'id');
    }

    public function remitente(){
        return $this->belongsTo(Remitente::class, 'solicitante_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function getGetFechaAttribute(){
        $fecha = explode('-', $this->fecha_recepcion);
        $fecha = array_reverse($fecha);

        return implode('/', $fecha);
    }
}
