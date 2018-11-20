<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetallesOrdenCompra;
use App\Models\Usuario;
use App\Models\EstadoPedido;

class OrdenCompra extends Model
{
    protected $table = "orden_compra";
    public $timestamps = false;
    
    public function estado() {
    	return $this->hasOne(EstadoPedido::class, 'id');
    }

    public function detalles() {
    	return $this->hasMany(DetallesOrdenCompra::class, 'id_orden');
    }

    public function usuario()
    {
		return $this->belongsTo(Usuario::class, 'number');
    }
}
