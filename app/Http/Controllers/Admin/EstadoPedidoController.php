<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstadoPedido;
use App\Http\Requests\EstadoPedidoRequest;

class EstadoPedidoController extends Controller
{
     public function index() {
        $estado = EstadoPedido::where('status', '1')->get();
    	return view('admin.estado_pedido.index')
            ->with(['estado' => $estado]);
    }

    public function create() {
        
    }

    public function store(EstadoPedidoRequest $request) {
    	$estado = new EstadoPedido;
        $estado->descripcion_estado = $request->descripcion_estado;
        $estado->save();
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
        return response()->json(['result' => true, 'text' => 'Genial! Tu estado ha sido actualizado!']);
    }
    
    public function destroy($id) {
    	$destroy = EstadoPedido::find($id);
        $destroy->status = '2';
        $destroy->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu estado ha sido borrado!']);
    }

    public function get()
    {
        $estado = EstadoPedido::where('status', '1')->get();
        return response()->json($estado);
    }
}
