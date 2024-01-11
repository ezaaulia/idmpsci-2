<?php

namespace App\Http\Controllers;

use App\Models\User;

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
        // Mengambil semua operator dari database
        $operators = User::where('role', 'operator')->get();

        return view('operator.isilihatope' , [
            'opere' => $operators,
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
        $operators = User::findOrFail($id);

        // Menghapus data siswa
        $operators->delete();

        return redirect('lihatoperator')->with('pesan', 'Data Siswa Berhasil di Hapus!!!');
        
    }

}
