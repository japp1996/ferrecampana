<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstadoPedido;
use App\Models\DetallesPedido;
use App\Models\Usuario;

class Pedido extends Model
{
    protected $table = "pedidos";
	public $timestamps = false;

    public function estado() {
    	return $this->hasOne(EstadoPedido::class, 'id');
    }

    public function detalles() {
    	return $this->hasMany(DetallesPedido::class, 'id_pedido');
    }

    public function usuario()
    {
		return $this->belongsTo(Usuario::class, 'number');
    }
}
