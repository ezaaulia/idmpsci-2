<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('isilogin' , [
            "title" => "Login"
        ]);

    }


    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }

        return back()->with('loginError', 'Gagal Login!');
    }

    // public function keluar(Request $request)
    // {
    //     Auth::keluar();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/login');
    // }
}
