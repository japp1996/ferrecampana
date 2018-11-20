<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::where('status', '1')->get();
    	return view('admin.categorias.index')
            ->with(['categorias' => $categorias]);
    }

    public function create() {
        
    }

    public function store(CategoriaRequest $request) {
    	$categ = new Categoria;
        $categ->code = $request->code;
        $categ->descripcion_categoria = $request->descripcion;
        $categ->save();
        return response()->json(['result' => true, 'text' => 'Registro completado']);
    }

    public function show() {
    	
    }

    public function edit() {
    	
    }

    public function update(CategoriaRequest $request, $id) {
    	$categ = Categoria::find($id);
        $categ->code = $request->code;
        $categ->descripcion_categoria = $request->descripcion;
        $categ->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu categoria ha sido actualizado!']);
    }
    
    public function destroy($id) {
    	$destroy = Categoria::find($id);
        $destroy->status = '2';
        $destroy->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tu categoria ha sido borrada!']);
    }

    public function get()
    {
        $categ = Categoria::where('status', '1')->get();
        return response()->json($categ);
    }
}
