<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\PasswordRequest;

class PasswordController extends Controller
{
    public function index() {
    	return view('admin.password.index');
    }

    public function update(PasswordRequest $request, $id) {
    	return $request;
    }
}
