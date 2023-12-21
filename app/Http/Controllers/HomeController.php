<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('beranda' , [
            // 'title' => 'Login'
        ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminBeranda()
    {
        return view('isiadmin' , [
            // 'title' => 'Login'
        ]);
    }

    public function operatorBeranda()
    {
        return view('isioperator' , [
            // 'title' => 'Login'
        ]);
    }
}
