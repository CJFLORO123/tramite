<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'documentos';
    public $timestamps = false;

    protected $fillable = [
        'num_recepcion','fecha_recepcion','hora_recepcion','num_documento','asunto','detalle','	tipoDocumento_id','periodo_id','solicitante_id','usuario_id','empresa_id','tipo_tramite'
   ];
}
