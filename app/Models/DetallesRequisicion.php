<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Requisicion;
use App\Models\Producto;

class DetallesRequisicion extends Model
{
    protected $table = "detalles_requisicion";
	public $timestamps = false;

    public function requisicion() 
    {
    	return $this->belongsTo(Requisicion::class, 'id');
    }

    public function productos()
    {
    	return $this->belongsTo(Producto::class, 'id');
    }
}
