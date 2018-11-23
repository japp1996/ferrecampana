<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Auditoria;

class PasswordController extends Controller
{
    public function index() {
    	return view('admin.password.index');
    }

    public function update(PasswordRequest $request, $id) {
    	if ($request->password == $request->password2) {
    		$change = Usuario::find($id);
    		$change->password = Hash::make($request->password);
    		$change->save();
            
            $auditoria = new Auditoria;
            $auditoria->number = 123456789;
            $auditoria->operacion = 'ACTUALIZACIÓN';
            $auditoria->detalles_operacion = 'Actualización de la contraseña para el usuario : C.I: '.$change->number.' Nombre: '.$change->name;
            $auditoria->save();
    		return response()->json(['result' => true, 'text' => 'Cambio de contraseña exitoso']);
    	}
    }
}
