<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class DetallesPedido extends Model
{
    protected $table = "detalles_pedido";
	public $timestamps = false;

    public function pedidos() {
    	$this->belongsTo(Pedido::class, 'ID_PEDIDO');
    }
}
