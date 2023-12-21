<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class OperatorController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function tambahope()
    // {
    //     return view('operator.isitambahope' , [
    //         'title' => 'Tambah Operator',
    //         // 'active' => 'login'

    //     ]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //      // Validasi data siswa
    // $this->validate($request, [
    //     'nama' => 'required',
    //     'email' => 'required',
    //     'username' => 'required',
    //     'alamat' => 'required',
    //     'no_hp' => 'required',
    //     'password' => 'required',
    //     'role' => 'required'
    // ],[
    //     'nama.required' => 'Nama wajib diisi!',
    //     'nama.min' => 'Nama minimal 9 karakter!',
    //     'nama.max' => 'Nama maksimal 100 karakter!',
    //     'email.required' => 'Email wajib diisi!',
    //     'username.required' => 'Username wajib diisi!',
    //     'alamat.required' => 'Alamat wajib diisi!',
    //     'no_hp.required' => 'Nilai wajib diisi!',
    //     'no_hp.min' => 'No.Hp minimal 11 karakter!',
    //     'no_hp.max' => 'No.Hp maksimal 13 karakter!',
    //     'password' => 'Password wajib diisi!',
    //     'role' => 'Role wajib diisi!',
    // ]);

    // User::create([
    //     'nama' => $request->nama,
    //     'email' => $request->email,
    //     'username' => $request->username,
    //     'alamat' => $request->alamat,
    //     'no_hp' => $request->no_hp,
    //     'role' => $request->role
    // ]);
    // // dd($filename);
    // return redirect()->route('lihatoperator')->with('pesan', 'Operator Berhasil di Tambahkan!!!');

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatope()
    {
        $user = User::all();

        return view('operator.isilihatope' , [
            'opere' => $user,
            'title' => 'Lihat Operator'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data siswa terlebih dahulu
        $siswa = User::findOrFail($id);

        // Menghapus data siswa
        $siswa->delete();

        return redirect('lihatoperator')->with('pesan', 'Data Siswa Berhasil di Hapus!!!');
        
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function hapusope($id)
    // {
    //     return view('operator.isihapusope' , [
    //         "title" => "Hapus Operator"
    //         ]);
    // }
}
