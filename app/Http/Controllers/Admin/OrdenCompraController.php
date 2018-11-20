<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrdenCompra;
use App\Models\Requisicion;
use App\Models\DetallesRequisicion;
use App\Models\DetallesOrdenCompra;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\OrdenCompraRequest;

class OrdenCompraController extends Controller
{
    public function index()
    {
    	$orden = OrdenCompra::where('id_estado', '!=', '1')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();

        $requisicion = Requisicion::where('id_estado', '!=','1')->where('id_estado', '!=', '5')
        ->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        
        return view('admin.orden.index')->with(['orden' => $orden, 'requisicion' => $requisicion]);
    }

    public function store(Request $request)
    {	
		$requisicion = Requisicion::find($request->id);
    	$requisicion->id_estado = 5;
    	$requisicion->save();

    	$orden = new OrdenCompra;
    	$orden->number = 123456789;
    	$orden->id_estado = 3;
    	$orden->save();

    	foreach ($request->detalles as $key => $value) {
            $detalles = new DetallesOrdenCompra;
            $detalles->id_orden = $orden->id;
            $detalles->id_producto = $value['id_producto'];
			$detalles->cantidad = $value['cantidad_requisicion'];
			$detalles->save();
        }
    	
        return response()->json(['result' => true, 'text' => 'Requisición importada con éxito']);
    }

    public function destroy($id)
    {
    	$destroy = OrdenCompra::find($id);
        $destroy->id_estado = '1';
        $destroy->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu Orden de compra ha sido borrada!']);
    }

    public function get()
    {
    	$orden = OrdenCompra::where('id_estado', '!=', '1')->where('id_estado', '!=', '5')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        return response()->json($orden);
    }

    public function getr()
    {
		$requisicion = Requisicion::where('id_estado', '!=','1')->where('id_estado', '!=', '5')
        ->with(['detalles' => function($q){
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
