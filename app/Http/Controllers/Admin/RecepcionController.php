<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrdenCompra;
use App\Models\Recepcion;
use App\Models\DetallesRecepcion;
use App\Models\DetallesOrdenCompra;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\RecepcionRequest;

class RecepcionController extends Controller
{
    public function index()
    {
        $recepcion = Recepcion::where('id_estado', '!=', '1')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();

        $orden = OrdenCompra::where('id_estado', '!=','1')->where('id_estado', '!=', '5')
        ->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        
        return view('admin.recepcion.index')->with(['recepcion' => $recepcion, 'orden' => $orden]);
    }

    public function store(Request $request)
    {   
        $orden = OrdenCompra::find($request->id);
        $orden->id_estado = 5;
        $orden->save();

        $recepcion = new Recepcion;
        $recepcion->number = 123456789;
        $recepcion->id_estado = 3;
        $recepcion->save();

        foreach ($request->detalles as $key => $value) {
            $detalles = new DetallesRecepcion;
            $detalles->id_recepcion = $recepcion->id;
            $detalles->id_producto = $value['id_producto'];
            $detalles->cantidad = $value['cantidad'];
            $detalles->save();
        }
        
        return response()->json(['result' => true, 'text' => 'Orden de compra importada con éxito']);
    }

    public function destroy($id)
    {
        $destroy = Recepcion::find($id);
        $destroy->id_estado = '1';
        $destroy->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu Recepción ha sido borrada!']);
    }

    public function get()
    {
        $recepcion = Recepcion::where('id_estado', '!=', '1')->where('id_estado', '!=', '5')->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        return response()->json($recepcion);
    }

    public function getr()
    {
        $orden = OrdenCompra::where('id_estado', '!=','1')->where('id_estado', '!=', '5')
        ->with(['detalles' => function($q){
            $q->with(['productos' => function($query) {
                $query->get();
            }])->get();
        }])->with(['usuario' => function($quer) {
            $quer->where('number', '123456789')->get();
        }])
        ->get();
        return response()->json($orden);
    }
}
