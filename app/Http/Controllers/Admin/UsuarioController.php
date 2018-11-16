<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {
    	$usuarios = Usuario::get();
        return view('admin.usuarios.index')->with(['usuarios' => $usuarios]);
    }

    public function create() {

    }

    public function store(UsuarioRequest $request) {
        $user = new Usuario;
        $user->number = $request->tipodoc."-".$request->number;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->date;
        $user->level = 'CLI';
        $user->save();
        return response()->json(['result' => true, 'text' => 'Registro completado']);
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
