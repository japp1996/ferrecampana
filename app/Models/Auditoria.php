<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Auditoria extends Model
{
    protected $table = "auditoria_usuarios";
    public $timestamp = false;

    public function usuarios() {
    	$this->hasMany(Usuario::class, 'number');
    }
}
