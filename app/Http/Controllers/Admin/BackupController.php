<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackupRequest;
use Illuminate\Console\Command;
use App\Models\Auditoria;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupController extends Controller
{
	public function index() {
		return view('admin.mantenimiento.respaldar');
	}

    public function store(BackupRequest $request)
    {
        $host = $request->server;
		$bd = $request->database; 
		$usuario = $request->user; 
		$contrasena = $request->password;   
		$formatobd = ".sql";

		$fechaderespaldo=date("d-m-Y_His");
		$archivosql = 'backup/'$bd.'_'.$fechaderespaldo.$formatobd;  
	
		$respaldo = "c:\\www\\mysql\\bin\\mysqldump.exe -u $usuario --password=$contrasena --opt $bd > $archivosql"; 
		system($respaldo, $resultado);
		$fecha=date('Y-m-d g:i:s-a');

		if ($resultado) {
			$auditoria = new Auditoria;
			return response()->json(['result' => false,'text' => 'Respaldo Fallido', 'file' => $archivosql]);
		 } else {
		 	return response()->json(['result' => false,'text' => 'Respaldo Exitoso']);
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
