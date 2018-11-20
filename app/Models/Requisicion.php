<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetallesRequisicion;
use App\Models\Usuario;
use App\Models\EstadoPedido;

class Requisicion extends Model
{
    protected $table = "requisicion";
    public $timestamps = false;
    
    public function estado() {
    	return $this->hasOne(EstadoPedido::class, 'id');
    }

    public function detalles() {
    	return $this->hasMany(DetallesRequisicion::class, 'id_requisicion');
    }

    public function usuario()
    {
		return $this->belongsTo(Usuario::class, 'number');
    }
}
