<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function lihatprofil()
    {
        return view('isilihatprofil' , [
            "profil" => User::all(),
            "title" => "Lihat Profil"
        ]);

    }


    public function editprofil($id)
    {

        $userp = $this->User->editp($id);

        return view('isieditprofil' , [
            'title' => 'Edit Profil',
            'userp' => $userp,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Request()->validate([
            'nama' => 'required',
            // 'email' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|max:10', 
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'no_hp.required' => 'No.HP wajib diisi!',
            'no_hp.numemric' => 'No.HP wajib angka!',
            'no_hp.max' => 'No.HO maksimal 13 karakter!',
        ]);
        

        $profil = [
            'nama' => Request()->nama,
            'username' => Request()->username,
            'alamat' => Request()->alamat,
            'no_hp' => Request()->no_hp,
        ];

        // $validatedData['users_id'] = auth()->user()->id;

        $this->User->editp($id, $profil);
        return redirect()->route('lihatprofil')->with('pesan', 'Data Diri Berhasil di Edit!!!');
    }
}
