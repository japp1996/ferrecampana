<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(LoginRequest $request)
    {    
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if (Auth::user()->level == 'CLI') {
                return response()->json([
                    'result' => true,
                    'location' => url('/intranet/dashboard')
                ]);
            } else {
                return response()->json([
                    'result' => false,
                    'error' => 'No tienes permisos para acceder.'
                ]);                
            }
        } else{
            return response()->json([
                'result' => false,
                'error' => "Correo Electrónico o Contraseña incorrectos"
            ]);
        }
    }
}
