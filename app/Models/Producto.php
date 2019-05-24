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
use App\Models\Proveedor;
use App\Models\MovimientoInventario;

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
        return $this->hasOne(Proveedor::class, 'id', 'id_proveedor');
    }

    public function movimiento()
    {
        return $this->belongsTo(MovimientoInventario::class, 'producto_id');
    }

    public function movimientos()
    {
        return $this->hasOne(MovimientoInventario::class, 'producto_id', 'id');
    }
}
