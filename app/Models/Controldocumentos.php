<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controldocumentos extends Model
{
    protected $table = 'control_documentos';
    public $timestamps = false;


    protected $fillable = [
         'num_documentos','tipo_tramite','tipoDocumento_id','fecha_registro'
    ];

    public function tipodocumento(){
        return $this->belongsTo(tipoDocumento::class, 'tipoDocumento_id', 'id');
    }

}
