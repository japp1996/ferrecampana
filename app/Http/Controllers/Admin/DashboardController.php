<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditoria;

class DashboardController extends Controller
{
    public function index()
    {
    	$pedido = Auditoria::where('rama', 'PEDIDO')->get();
		$pedido = count($pedido);

    	$requi = Auditoria::where('rama', 'REQUISICION')->get();
		$requi = count($requi);

    	$recep = Auditoria::where('rama', 'RECEPCION')->get();
		$recep = count($recep);

    	$oc = Auditoria::where('rama', 'ORDEN DE COMPRA')->get();
		$oc = count($oc);

    	$respaldo = Auditoria::where('rama', 'RESPALDO')->get();
		$respaldo = count($respaldo);

		$restauracion = Auditoria::where('rama', 'RESTAURACION')->get();
		$restauracion = count($restauracion);

		$registros = Auditoria::where('operacion', 'REGISTRO')->get();
		$registros = count($registros);

		$actualizacion = Auditoria::where('operacion', 'REGISTRO')->get();
		$actualizacion = count($actualizacion);

		$borrado = Auditoria::where('operacion', 'REGISTRO')->get();
		$borrado = count($borrado);

		return view('admin.index')->with(['pedido' => $pedido, 'requi' => $requi, 'recep' => $recep, 'oc' => $oc, 'respaldo' => $respaldo, 'restauracion' => $restauracion, 'registros' => $registros, 'actualizacion' => $actualizacion, 'borrado' => $borrado]);
    }
}
