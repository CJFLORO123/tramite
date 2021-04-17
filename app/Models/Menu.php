<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menus';
    public $timestamps = false;

    public function privilegios(){
        return $this->hasMany(Privilegio::class);
    }

    protected $fillable = [
        'orden', 'padre'
    ];
}
