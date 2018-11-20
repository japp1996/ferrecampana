<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Recepcion;

class DetallesRecepcion extends Model
{
    protected $table = "detalles_recepcion";
	public $timestamps = false;

    public function orden() 
    {
    	return $this->belongsTo(Recepcion::class, 'id');
    }

    public function productos()
    {
    	return $this->belongsTo(Producto::class, 'id');
    }
}
