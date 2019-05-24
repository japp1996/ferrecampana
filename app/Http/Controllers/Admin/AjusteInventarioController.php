<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\MovimientoInventario;

class AjusteInventarioController extends Controller
{
    public function index()
    {
        $productos = Producto::select('productos.id','productos.code','productos.name', 'productos.price','productos.stock','productos.stock_min','productos.stock_max', 'productos.unity','categorias.descripcion_categoria','categorias.code as codecat')
        ->join('categorias' ,'productos.id_categoria', 'categorias.code')
        ->where('productos.status', '1')
        ->get();
        
        return view('admin.inventario.ajuste')->with(['productos' => $productos]);
    }
    public function get()
    {
        $productos = Producto::select('productos.id','productos.code','productos.name', 'productos.price','productos.stock','productos.stock_min','productos.stock_max', 'productos.unity','categorias.descripcion_categoria','categorias.code as codecat')
        ->join('categorias' ,'productos.id_categoria', 'categorias.code')
        ->where('productos.status', '1')
        ->get();
        
        return response()->json(['productos' => $productos]);
    }
    public function store(Request $request)
    {
        $producto = Producto::find($request->producto_id);
        if ($request->cantidad == $producto->stock) {
            return response()->json(['error' => 'No ingrese un ajuste por la cantidad actual de stock.'], 422);
        }
        if ($request->cantidad < 0) {
            return response()->json(['error' => 'No puede ingresar numeros negativos.'], 422);
        }
        
        $ajuste = new MovimientoInventario;
        $ajuste->producto_id = $request->producto_id;
        $ajuste->tipo_movimiento = $producto->stock > $request->cantidad ? '4' : '3';
        $ajuste->cantidad = $producto->stock > $request->cantidad ? $producto->stock - $request->cantidad : $request->cantidad - $producto->stock;
        $ajuste->save();

        $producto->stock = $request->cantidad;
        $producto->save();
        return response()->json(['result' => true]);

    }
}
