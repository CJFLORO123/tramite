<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    public $timestamps = false;

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

    protected $fillable = [
        'descripcion', 'accesos'
    ];

    public function setDescripcionAttribute($value){
        $this->attributes['descripcion'] = strtoupper($value);
    }
}
