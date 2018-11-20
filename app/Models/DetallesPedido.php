<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;

class DetallesPedido extends Model
{
    protected $table = "detalles_pedido";
	public $timestamps = false;

    public function pedidos() 
    {
    	return $this->belongsTo(Pedido::class, 'id');
    }

    public function productos() 
    {
    	return $this->belongsTo(Producto::class, 'id');
    }
}
