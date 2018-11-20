<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\OrdenCompra;

class DetallesOrdenCompra extends Model
{
    protected $table = "detalles_orden_compra";
	public $timestamps = false;

    public function orden() 
    {
    	return $this->belongsTo(OrdenCompra::class, 'id');
    }

    public function productos()
    {
    	return $this->belongsTo(Producto::class, 'id');
    }
}
