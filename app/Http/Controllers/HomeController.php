<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	return View('content.index');
    }

    public function who() {
    	return View('content.who');
    }

    public function products() {
    	return View('content.products');
    }

    public function contact() {
    	return View('content.contact');
    }

    public function login() {
    	return View('content.login');
    }

    public function forgotPassword() {
    	return view('content.password');
    }
}
