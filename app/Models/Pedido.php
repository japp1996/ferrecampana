<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstadoPedido;
use App\Models\DetallesPedido;

class Pedido extends Model
{
    protected $table = "pedidos";
	public $timestamps = false;

    public function estado() {
    	$this->hasOne(EstadoPedido::class, 'id');
    }

    public function detalles() {
    	$this->hasMany(DetallesPedido::class, 'id_pedido');
    }
}
