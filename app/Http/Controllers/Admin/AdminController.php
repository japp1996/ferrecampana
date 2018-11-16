<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('intranet/dashboard');
        }
        return view('content.login');
    }

    public function home()
    {
        return redirect('intranet/dashboard');
    }
}
