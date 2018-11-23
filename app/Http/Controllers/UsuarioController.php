<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Models\Auditoria;

class UsuarioController extends Controller
{
    public function index() {
        return view('content.create');
    }

    public function store(UsuarioRequest $request) {
        $users = new Usuario;
        $users->tipodoc = $request->tipodoc;
        $users->number = $request->number;
        $users->name = $request->name;
        $users->password = Hash::make($request->password);
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->birthday = $request->date;
        $users->level = 'CLI';
        $users->status = '1';
        $users->save();
        
        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'REGISTRO';
        $auditoria->rama = 'USUARIO';
        $auditoria->detalles_operacion = 'Registro de un nuevo usuario bajo C.I: '.$user->number.' ';
        $auditoria->save();
        return response()->json(['result' => true, 'text' => 'Registro completado']);
    }
}
