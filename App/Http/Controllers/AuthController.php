<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if (Auth::guard('guru')->attempt(['NUPTK' => $request->NUPTK, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with(['warning'=>'NUPTK / Password Salah']);
        }
    }

    public function proseslogout()
    {
        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
            return redirect('/');
        }
    }
}
