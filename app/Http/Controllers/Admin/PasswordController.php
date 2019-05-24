<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Auditoria;
use Auth;

class PasswordController extends Controller
{
    public function index() {
    	return view('admin.password.index')->with(['current' => 'yo']);
    }

    public function store(PasswordRequest $request) {
    	if ($request->password == $request->password2) {
    		$change = Usuario::find(Auth::user()->number);
    		$change->password = Hash::make($request->password);
    		$change->save();
            
            $auditoria = new Auditoria;
            $auditoria->number = Auth::user()->number;
            $auditoria->operacion = 'ACTUALIZACIÓN';
            $auditoria->rama = 'CONTRASEÑA';
            $auditoria->detalles_operacion = 'Actualización de la contraseña para el usuario : C.I: '.$change->number.' Nombre: '.$change->name;
            $auditoria->save();
    		return response()->json(['result' => true, 'text' => 'Cambio de contraseña exitoso']);
    	}
    }
}
