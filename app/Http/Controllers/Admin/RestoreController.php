<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditoria;
use Auth;

class RestoreController extends Controller
{
    public function index() {
    	return view('admin.mantenimiento.restaurar')->with(['current' => 'mant']);	
    }

    public function store() {
    	$host = $request->server;
		$bd = $request->database; 
		$usuario = $request->user; 
		$contrasena = $request->password;   
		$formatobd = ".sql";

    	$respaldo = "c:\\www\\mysql\\bin\\mysqldump.exe -u $usuario --password=$contrasena --opt $bd < $archivosql"; 
		system($respaldo, $resultado);
		if ($resultado) {
		    $auditoria = new Auditoria;
	        $auditoria->number = Auth::user()->number;
	        $auditoria->operacion = 'BASE DE DATOS';
	        $auditoria->rama = 'RESTAURACION';
	        $auditoria->detalles_operacion = 'Restauración de los datos: '.$requisicion->id.' ';
	        $auditoria->save();
			return response()->json(['result' => false,'text' => 'Respaldo Fallido', 'file' => $archivosql]);
		 } else {
		 	return response()->json(['result' => false,'text' => 'Respaldo Exitoso']);
		}
    }
}
