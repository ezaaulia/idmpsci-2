<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|max:255',
            'email' => ['required', 'email:dns', 'max:255', 'unique:users'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'alamat' => 'required|max:255',
            'no_hp' => 'required|min:11|max:13',
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return redirect('/login')->with('success', 'Sign Up Berhasil! Silahkan Login');
    }

    
}
