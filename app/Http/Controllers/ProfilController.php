<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function lihatprofil()
    {
        return view('isilihatprofil' , [
            "title" => "Lihat Profil"
        ]);

    }


    public function editprofil()
    {
        return view('isieditprofil' , [
            "title" => "Edit Profil"
        ]);

    }
}
