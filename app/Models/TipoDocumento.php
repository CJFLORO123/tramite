<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipodocumento';
    public $timestamps = false;

    
    protected $fillable = [
         'nombre_tipoDocumento'
    ];

    public function controldocumento(){
        return $this->hasMany(Controldocumentos::class);
    }

    public function documentos(){
        return $this->hasMany(Documentos::class);
    }
}
