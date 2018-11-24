<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Auditoria;
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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if (Auth::user()->level == 'CLI') {
                $auditoria = new Auditoria;
                $auditoria->number = 123456789;
                $auditoria->operacion = 'LOGIN';
                $auditoria->rama = 'LOGIN';
                $auditoria->detalles_operacion = 'EL usuario '.
                    Auth::user()->name.' C.I: '.
                    Auth::user()->tipodoc
                    .Auth::user()->number. ' Inició Sesión';
                $auditoria->save();
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

    public function logout() {
        
        $auditoria = new Auditoria;
        $auditoria->number = 123456789;
        $auditoria->operacion = 'LOGIN';
        $auditoria->rama = 'LOGOUT';
        $auditoria->detalles_operacion = 'EL usuario '.
            Auth::user()->name.' C.I: '.
            Auth::user()->tipodoc
            .Auth::user()->number. ' Cerró Sesión';
        $auditoria->save();
        Auth::logout();
        return redirect('');
    }
}
