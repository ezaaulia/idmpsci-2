<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('isilogin' , [
            'title' => 'Login'
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required', 
        ],[
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Password wajib diisi!',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'operator'){
                return redirect('admin/operator');
            }
        }else{
            return redirect('')->withErrors('Email atau Password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    



    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        
        return redirect('');
    }
    // public function keluar(Request $request)
    // {
    //     Auth::keluar();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/login');
    // }
}
