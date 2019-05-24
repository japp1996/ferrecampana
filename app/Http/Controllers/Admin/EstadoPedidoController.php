<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstadoPedido;
use App\Http\Requests\EstadoPedidoRequest;
use App\Models\Auditoria;
use Auth;

class EstadoPedidoController extends Controller
{
     public function index() {
        $estado = EstadoPedido::where('status', '1')->get();
    	return view('admin.estado_pedido.index')
            ->with(['estado' => $estado, 'current' => 'process']);
    }

    public function create() {
        
    }

    public function store(EstadoPedidoRequest $request) {
    	$estado = new EstadoPedido;
        $estado->descripcion_estado = $request->descripcion_estado;
        $estado->save();
        $auditoria = new Auditoria;
        $auditoria->number = Auth::user()->number;
        $auditoria->operacion = 'REGISTRO';
        $auditoria->rama = 'ESTADO DE PEDIDO';
        $auditoria->detalles_operacion = 'Registro de un tipo de estado de pedidos con el nombre de '.$request->descripcion_estado;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Registro completado']);
    }

    public function show() {
    	
    }

    public function edit() {
    	
    }

    public function update(EstadoPedidoRequest $request, $id) {
    	$estado = EstadoPedido::find($id);
        $estado->descripcion_estado = $request->descripcion_estado;
        $estado->save();
        $auditoria = new Auditoria;
        $auditoria->number = Auth::user()->number;
        $auditoria->operacion = 'ACTUALIZACION';
        $auditoria->rama = 'ESTADO DE PEDIDO';
        $auditoria->detalles_operacion = 'Actualizacion de un tipo de estado de pedidos con el id: '.$estado->id.' y la descripción: '.$estado->descripcion_estado;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu estado ha sido actualizado!']);
    }
    
    public function destroy($id) {
    	$destroy = EstadoPedido::find($id);
        $destroy->status = '2';
        $destroy->save();
        $auditoria = new Auditoria;
        $auditoria->number = Auth::user()->number;
        $auditoria->operacion = 'BORRADO';
        $auditoria->rama = 'ESTADO DE PEDIDO';
        $auditoria->detalles_operacion = 'Borrado de un tipo de estado de pedidos con el id: '.$id;
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu estado ha sido borrado!']);
    }

    public function get()
    {
        $estado = EstadoPedido::where('status', '1')->get();
        return response()->json($estado);
    }
}
