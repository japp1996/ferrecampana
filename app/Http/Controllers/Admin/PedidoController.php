<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\EstadoPedido;
use App\Models\DetallesPedido;


class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::with(['estado', 'detalles']) 
                ->get();
        $productos = Producto::join('categorias','productos.id_categoria', 'categorias.code')->where('productos.status', '1')
                ->get();
        $categorias = Categoria::get();
    	return view('admin.pedidos.index')
            ->with(['pedidos' => $pedidos, 'productos' => $productos, 'categorias' => $categorias]);
    }

    public function create() {

    }

    public function store() {
    	
    }

    public function show() {
    	
    }

    public function edit() {
    	
    }

    public function update() {
    	
    }
    
    public function destroy() {
    	
    }
}
