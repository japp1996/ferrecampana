<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MovimientoInventario;

class MovimientoInventarioController extends Controller
{
    public function index()
    {
        $mov = MovimientoInventario::with(['producto'])->orderBy('producto_id')->get();
        return view('admin.inventario.reporte')->with(['movimiento' => $mov]);
    }
}
