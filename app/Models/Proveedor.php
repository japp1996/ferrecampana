<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Proveedor extends Model
{
    protected $table = "proveedores";

    public function producto()
    {
    	return $this->belongsTo(Producto::class, 'id_proveedor');
    }

}
