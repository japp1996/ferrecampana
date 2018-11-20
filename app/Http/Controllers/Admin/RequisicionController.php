<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requisicion;
use App\Models\DetallesRequisicion;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\RequisicionRequest;

class RequisicionController extends Controller
{
    public function index() 
    {
        $requisicion = Requisicion::with(['detalles']) 
                ->get();
        $productos = Producto::select('productos.id','productos.code as idP', 'productos.name', 'productos.id_categoria', 'productos.unity', 'categorias.code', 'categorias.descripcion_categoria')
            ->join('categorias','productos.id_categoria', 'categorias.code')
            ->where('productos.status', '1')
            ->get();
        $categorias = Categoria::get();
        return view('admin.requisicion.index')
         ->with(['requisicion' => $requisicion, 'productos' => $productos, 'categorias' => $categorias]);
    }

    public function create() {

    }

    public function store(Request $request) 
    {
        $requisicion = new Requisicion;
        $requisicion->number = 123456789;
        $requisicion->id_estado = 3;
        $requisicion->save();
        foreach ($request->all() as $key) {
            $detalles = new DetallesRequisicion;
            $detalles->id_requisicion = $requisicion->id;
            $detalles->id_producto = $key['id_producto'];
            $detalles->cantidad_requisicion = $key['cantidad'];
            $detalles->save();
        }
        return response()->json(['result' => true, 'text' => 'Requisición realizado con éxito']);
    }

    public function show() 
    {
        $requisicion = Requisicion::where('id_estado', '!=', '1')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        return view('admin.requisicion.show')->with(['requisicion' => $requisicion]);
    }

    public function edit() 
    {
        
    }

    public function update() 
    {
        
    }
    
    public function destroy($id) 
    {
        $destroy = Requisicion::find($id);
        $destroy->id_estado = '1';
        $destroy->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu Requisicion ha sido borrada!']);
    }

    public function get()
    {
        $requisicion = Requisicion::where('id_estado', '!=', '1')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        return response()->json($requisicion);

    }
}
