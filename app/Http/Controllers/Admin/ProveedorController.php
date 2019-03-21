<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{
    public function index()
    {
    	$proveedor = Proveedor::where('status', '!=', 2)->get();
    	return view('admin.proveedores.index')->with(['proveedores' => $proveedor]);
    }

    public function create()
    {
    	
    }

    public function store(ProveedorRequest $request)
    {
    	$prov = new Proveedor;
    	$prov->dni = $request->dni;
    	$prov->name = $request->name;
    	$prov->description = $request->description;
    	$prov->contact_name = $request->contact_name;
    	$prov->phone = $request->phone;
    	$prov->email = $request->email;
    	$prov->address = $request->address;
    	$prov->status = 1;
    	if ($prov->save()) {
    		return response()->json(['result' => true, 'text' => 'Proveedor Registrado con éxito']);
    	}
    }

    public function update(ProveedorRequest $request, $id)
    {
    	$prov = Proveedor::find($id);
    	$prov->dni = $request->dni;
    	$prov->name = $request->name;
    	$prov->description = $request->description;
    	$prov->contact_name = $request->contact_name;
    	$prov->phone = $request->phone;
    	$prov->email = $request->email;
    	$prov->address = $request->address;
    	if ($prov->save()) {
    		return response()->json(['result' => true, 'text' => 'Proveedor Actualizado con éxito']);
    	}
    }

    public function destroy(Request $request, $id)
    {
    	$prov = Proveedor::find($id);
    	$prov->status = 2;
    	if ($prov->save()) {
    		return response()->json(['result' => true, 'text' => 'Proveedor Borrado con éxito']);
    	}
	}
	
	public function get()
	{
		$proveedor = Proveedor::where('status', '!=', 2)->get();
    	return response()->json(['data' => $proveedor]);
	}
}
