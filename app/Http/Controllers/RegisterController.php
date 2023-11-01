<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function regis()
    {
        return view('isiregis' , [
            'title' => 'Registrasi'
        ]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => ['required', 'email:dns', 'max:255', 'unique:users'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'alamat' => 'required|max:255',
            'no_hp' => 'required|min:11|max:13',
            // 'level' => 'required|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        // Untuk mengenkripsi password d database bsa pke dua cara yaitu :

        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);

        // $request->session()->flash('success', 'Sign Up Berhasil! Silahkan Login');

        return redirect('/login')->with('success', 'Sign Up Berhasil! Silahkan Login');

    }
}
