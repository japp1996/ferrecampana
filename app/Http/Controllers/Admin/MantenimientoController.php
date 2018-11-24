<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditoria;

class MantenimientoController extends Controller
{
    public function index() {
    	return view('admin.mantenimiento.index');
    }

    public function audit() {
        $audit = Auditoria::with(['usuarios'])->get();
        return view('admin.mantenimiento.auditoria')->with(['auditoria' => $audit]);
    }

    public function create() {

    }

    public function store() {
    	
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
