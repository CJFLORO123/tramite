<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    public $timestamps = false;

    public function usuario(){
        return $this->hasMany(Usuario::class);
    }

    protected $fillable = [
         'nombre_area'
    ];

}
