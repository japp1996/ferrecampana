<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class EstadoPedido extends Model
{
    protected $table = "estado";
	public $timestamps = false;
    
    public function pedidos() {
    	$this->belongsToMany(Pedido::class, 'id_estado');
    }
}
