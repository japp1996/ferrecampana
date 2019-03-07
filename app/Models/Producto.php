<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\DetallesPedido;
use App\Models\DetallesRequisicion;
use App\Models\DetallesRecepcion;
use App\Models\DetallesOrdenCompra;
use App\Models\OrdenCompra;
use App\Models\Recepcion;
use App\Models\Requisicion;

class Producto extends Model
{
    public $timestamps = false;
    
    protected $table = "productos";

    public function categorias()
    {
        return $this->hasOne(Categoria::class, 'code');
    }

    public function detallesPedidos()
    {
		return $this->belongsTo(DetallesPedido::class, 'id_producto');
    }

    public function detalesRequisicion()
    {
        return $this->belongsTo(DetallesRequisicion::class, 'id_producto');
    }

    public function detalesRecepcion()
    {
        return $this->belongsTo(DetallesRecepcion::class, 'id_producto');
    }

    public function detalesOrdenCompra()
    {
        return $this->belongsTo(DetallesOrdenCompra::class, 'id_producto');
    }

    public function proveedor()
    {
        return $this->hasOne(Producto::class, '', '');
    }
}
