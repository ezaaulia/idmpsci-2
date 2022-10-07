<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function lihatprofil()
    {
        return view('isilihatprofil' , [
            'profil' => User::all(),
            'title' => 'Lihat Profil'
        ]);

    }


    public function editprofil($id)
    {

        $userp = User::find($id);

        return view('isieditprofil' ,
        [
            'userp' => $userp,
            'title' => 'Edit Profil',
        ]);
        // return view('isieditprofil', compact('userp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            // 'email' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|max:13', 
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'no_hp.required' => 'No.HP wajib diisi!',
            'no_hp.numemric' => 'No.HP wajib angka!',
            'no_hp.max' => 'No.HP maksimal 13 karakter!',
        ]);
        
        $userp = User::find($id);
        // $userp -> update($request->all());
        $userp -> nama = $request -> nama;
        $userp -> username = $request -> username;
        $userp -> alamat = $request -> alamat;
        $userp -> no_hp = $request -> no_hp;
        $userp->update();

     
        return redirect()->route('lihatprofil')->with('pesan', 'Data Diri Berhasil di Edit!!!');
    }
}
