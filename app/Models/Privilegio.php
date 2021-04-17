<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    protected $table = 'privilegios';
    public $timestamps = false;


    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    protected $fillable = [
        'menu_id', 'usuario_id'
    ];

}
