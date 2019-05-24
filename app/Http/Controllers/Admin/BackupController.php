<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackupRequest;
use Illuminate\Console\Command;
use App\Models\Auditoria;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Auth; 

class BackupController extends Controller
{
	public function index() {
		return view('admin.mantenimiento.respaldar')->with(['current' => 'mant']);
	}

    public function store(BackupRequest $request)
    {
        $host = $request->server;
		$bd = $request->database;
		$usuario = $request->user;
		$contrasena = $request->password;
		$formatobd = ".sql";

		$fechaderespaldo=date("d-m-Y_His");
		$archivosql = 'backup/'.$bd.'_'.$fechaderespaldo.$formatobd;

		$respaldo = "c:\\www\\mysql\\bin\\mysqldump.exe -u $usuario --password=$contrasena --opt $bd > $archivosql";
		system($respaldo, $resultado);
		$fecha=date('Y-m-d g:i:s-a');

		if (!$resultado) {
			if(file_exists(public_path($archivosql))){
			  unlink(public_path($archivosql));
			}
			return response()->json(['result' => false,'text' => 'Respaldo Fallido']);
		 } else {
		 	$auditoria = new Auditoria;
			$auditoria->number = Auth::user()->number;
			$auditoria->operacion = 'BASE DE DATOS';
			$auditoria->rama = 'RESPALDO';
			$auditoria->detalles_operacion = 'Respaldo de Base de Datos bajo el archivo '.$archivosql.'';
			$auditoria->save();
		 	return response()->json(['result' => true,'text' => 'Respaldo Exitoso', 'file' => $archivosql]);
		}
    }


    public function handle()
    {
        try {
            $this->process->mustRun();
            return response()->json('text','El respaldo ha sido realizado exitosamente.');
        } catch (ProcessFailedException $exception) {
            return response()->json('text','El proceso de respaldo ha fallado.');
        }
    }
}
