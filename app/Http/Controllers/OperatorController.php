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
     * Display the specified resource.
     *
     * @param  
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
