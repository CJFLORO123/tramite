<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodo';
    public $timestamps = false;

    protected $fillable = [
         'anio'
    ];

    public function documentos(){
        return $this->hasMany(Documentos::class);
    }
}
