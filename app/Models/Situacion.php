<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacion extends Model
{
    protected $table = 'situacion';
    public $timestamps = false;


    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

}
