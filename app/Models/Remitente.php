<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remitente extends Model
{
    protected $table = 'solicitante';
    public $timestamps = false;


    protected $fillable = [
         'nom_solicitante','cargo','dni_ruc','cor_solicitante'
    ];

    public function documentos(){
        return $this->hasMany(Documentos::class);
    }
}
