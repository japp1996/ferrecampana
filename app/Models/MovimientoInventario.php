<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class MovimientoInventario extends Model
{
    protected $table = "movimiento_inventario";    

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
