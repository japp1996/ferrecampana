<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Http\Request\ProfileRequest;

class PerfilController extends Controller
{
    public function index() {
        $usuario = Usuario::select('id','name','number','address','phone','email')
            ->where('number',123456789)
            ->first();
    	return view('admin.perfil.index')->with(['usuario' => $usuario]);
    }

    public function store() {

    }

    public function update(ProfileRequest $request, $id) {
    	$usuario = Usuario::find($id);
        $usuario->number = $request->number;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->phone = $request->phone;
        $usuario->address = $request->address;
        $usuario->save();
        return response()->json(['result' => true, 'text' => 'Genial! Tus datos han sido actualizados!']);

    }
    
    public function destroy() {
    	$destroy = Usuario::find($id);
        $destroy->status = '3';
        $destroy->save();
        Auth::logout();
        return response()->json(['result' => true, 'text' => 'Que pena! Sin embargo Tu cuenta ha sido borrada, gracias por haber estado con nostros!', 'location' => url('/')]);
    }
}
