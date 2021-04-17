<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    public $timestamps = false;


    protected $fillable = [
         'nombre_empresa'
    ];

    public function documentos(){
        return $this->hasMany(Documentos::class);
    }
}
