<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Auditoria;
use Exporter;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::select('productos.id','productos.code','productos.name', 'productos.price','productos.stock', 'productos.unity','categorias.descripcion_categoria','categorias.code as codecat')->join('categorias' ,'productos.id_categoria', 'categorias.code')->where('productos.status', '1')
                ->get();
        $categorias = Categoria::select('code','descripcion_categoria')->get();
        return view('admin.productos.index')->with(['productos' => $productos, 'categorias' => $categorias]);
    }

    public function create() {

    }

    public function store(ProductoRequest $request) {
        $prod = new Producto;
        $prod->code = $request->code;
        $prod->name = $request->name;
        $prod->id_categoria = $request->id_categoria;
        $prod->stock = $request->stock;
        $prod->unity = $request->unity;
        $prod->price = $request->price;
        $prod->save();
        
        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'REGISTRO';
        $auditoria->rama = 'PRODUCTOS';
        $auditoria->detalles_operacion = 'Registro del producto código: '.$prod->code.', Nombre: '.$prod->name;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Registro completado']);
    }

    public function show() {
    	
    }

    public function edit() {
    	
    }

    public function update(ProductoRequest $request, $id) {
        $prod = Producto::find($id);
        $prod->name = $request->name;
        $prod->id_categoria = $request->id_categoria;
        $prod->stock = $request->stock;
        $prod->unity = $request->unity;
        $prod->price = $request->price;
        $prod->save();

        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'ACTUALIZACIÓN';
        $auditoria->rama = 'PRODUCTOS';
        $auditoria->detalles_operacion = 'Actualización del producto código: '.$prod->code.', Nombre:'.$prod->name;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu producto ha sido actualizado!']);
    }
    
    public function destroy($id) {
        $destroy = Producto::find($id);
        $destroy->status = "2";
        $destroy->save();

        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'BORRADO';
        $auditoria->rama = 'PRODUCTOS';
        $auditoria->detalles_operacion = 'Borrado del producto código: '.$destroy->code.', Nombre:'.$destroy->name;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu producto ha sido borrado!']);
    }

    public function get()
    {
        $productos = Producto::select('productos.id','productos.code','productos.name', 'productos.price','productos.stock', 'productos.unity','categorias.descripcion_categoria','categorias.code as codecat')->join('categorias' ,'productos.id_categoria', 'categorias.code')->where('productos.status', '1')
                ->get();
        return response()->json($productos);
    }

    public function excel()
    {
        $productos = Producto::select('productos.id','productos.code','productos.name', 'productos.price','productos.stock', 'productos.unity','categorias.descripcion_categoria','categorias.code as codecat')->join('categorias' ,'productos.id_categoria', 'categorias.code')->where('productos.status', '1')
                ->get();
        $excel = Exporter::make('Excel');
        $excel->load($productos);
        return $excel->stream("excel_".Carbon::now());
    }
}