<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditoria;

class DashboardController extends Controller
{
    public function index()
    {
    	$auditoria = Auditoria::with(['usuarios'])->get();
		return view('admin.index')->with(['auditoria' => $auditoria]);
    }
}
