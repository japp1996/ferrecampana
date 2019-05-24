<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\MovimientoInventario;

class ReporteInventarioController extends Controller
{
    public function index()
    {
        //$movimientos = MovimientoInventario::where('tipo_movimiento', ['3','4'])->with('producto')->get();
        $productos = Producto::select('id', 'name')
        ->get();
        return view('admin.inventario.reporte')->with(['productos' => $productos]);
    }

    public function store(Request $request)
    {
        if ($request->producto_id == "") {
            return response()->json(['error' => 'Por favor, Seleccione un producto'],422);
        }

        $data = MovimientoInventario::where('producto_id', $request->producto_id)
        ->with('producto')
        ->get();
        
        return response()->json(['result'=>true, 'data' => $data]);
    }

}
