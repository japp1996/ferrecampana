<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requisicion;
use App\Models\DetallesRequisicion;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Auditoria;
use App\Http\Requests\RequisicionRequest;

class RequisicionController extends Controller
{
    public function index() 
    {
        $requisicion = Requisicion::with(['detalles']) 
                ->get();
        $productos = Producto::select('productos.id','productos.code as idP', 'productos.name', 'productos.id_categoria', 'productos.unity', 'productos.stock', 'categorias.code', 'categorias.descripcion_categoria')
            ->join('categorias','productos.id_categoria', 'categorias.code')
            ->where('productos.status', '1')
            ->where('productos.stock', '<', '11')
            ->get();
        $categorias = Categoria::get();
        return view('admin.requisicion.index')
         ->with(['requisicion' => $requisicion, 'productos' => $productos, 'categorias' => $categorias, 'current' => 'req']);
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

        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'REGISTRO';
        $auditoria->rama = 'REQUISICION';
        $auditoria->detalles_operacion = 'Registro de una nueva requisición con el id: '.$requisicion->id.' ';
        $auditoria->save();
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
        return view('admin.requisicion.show')->with(['requisicion' => $requisicion, 'current' => 'list']);
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
        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'BORRADO';
        $auditoria->rama = 'REQUISICION';
        $auditoria->detalles_operacion = 'Borrado de una requisición: '.$id.' ';
        $auditoria->save();
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
