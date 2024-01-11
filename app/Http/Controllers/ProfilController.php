<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
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
     * Menampilkan profil pengguna yang sudah login.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatprofil()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        return view('isilihatprofil' , [
            'profil' => $user,
        ]);

    }

    /**
     * Menampilkan form untuk mengedit profil pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function editprofil(Request $request)
    {

        // Mendapatkan informasi pengguna yang sedang login
        $userp = Auth::user();
        // $userp = $request->user();

        return view('isieditprofil' ,
        [
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
    public function update(Request $request, $id)
    {
        $userp = Auth::user();
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'nama' => 'required',
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
        
        // Update informasi pengguna dengan data yang baru
        $userp = User::findOrFail($id);

        $userp->nama = $validatedData['nama'];
        $userp->username = $validatedData['username'];
        $userp->alamat = $validatedData['alamat'];
        $userp->no_hp = $validatedData['no_hp'];

        $userp->save();

     
        return redirect()->route('lihatprofil')->with('pesan', 'Data Diri Berhasil di Edit!!!');
    }
}
