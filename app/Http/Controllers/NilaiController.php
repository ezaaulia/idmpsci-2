<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\ImportData;
use App\Models\NilaiTes;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\C45;
use C45\C45;

class NilaiController extends Controller
{
    /**
     * Menampilkan daftar data siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Memeriksa apakah pengguna telah login
        // if (Auth::check()) {
        //     $data = DataSiswa::all();
        //     return view('siswa.isieditnil', compact('data'));
        // } else {
        //     return redirect()->route('login')->with(['msg' => 'Anda harus login!']);
        // }

        // $data = DataSiswa::all();
        // return redirect()->route('nilai.isieditnil');
        return view('nilai.isieditnil', );
        // [
        //     // 'edits' => $edits, 
        //     // 'editn' => $editn,
        //     'title' => 'Edit Data Siswa', 
        // ]
        // );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editnil($id)
    {

        // Memeriksa apakah pengguna telah login
        if (Auth::check()) {
            $nilai = DataSiswa::findOrFail($id);
            return view('nilai.editnil', compact('nilai'));
        } else {
            return redirect()->route('login')->with(['msg' => 'Anda harus login!']);
        }

        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function tambahnil($id)
    // {   

    //     return view('siswa.isitambahnil', [ 
    //         'idsiswa' => $id,
    //         'title' => 'Tambah Nilai Siswa'
    //         ]);
    // }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function save(Request $request, $id)
    // {
        
    //     // Validasi data siswa
    //     Request()->validate([
    //         'nilai_tes_mtk' => 'required','numeric',
    //         'nilai_tes_ipa' => 'required', 'numeric',
    //         'nilai_tes_agama' => 'required', 'numeric',
    //         'nilai_tes_bindo' => 'required', 'numeric',
    //         'status_kelas' => 'required',
    //     ],[
    //             'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
    //             'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
    //             'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
    //             'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
    //             'nilai_tes_agama.required' => 'Nilai wajib diisi!',
    //             'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
    //             'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
    //             'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
    //             'status_kelas.required' => 'Kelas wajib diisi!',
    //     ]);

    //     // Memuat model pohon keputusan C45
    //     $filename = public_path('/csv/Data_Training.csv');
    //     $c45 = new C45([
    //         'targetAttribute' => 'status_kelas',
    //         'trainingFile' => $filename,
    //         'splitCriterion' => C45::SPLIT_GAIN,
    //     ]);
    //     $tree = $c45->buildTree();
    //     $treeString = $tree->toString();

    //     // Data yang akan diklasifikasikan
    //     $data = [
    //         'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
    //         'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
    //         'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
    //         'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
    //     ];

    //     // Melakukan klasifikasi menggunakan pohon keputusan C45
    //     $hasil = $tree->classify($data);
        

    //     $model = new NilaiTes();
    //     $model -> nilai_tes_mtk = $request->nilai_tes_mtk;
    //     $model -> nilai_tes_ipa = $request->nilai_tes_ipa;
    //     $model -> nilai_tes_agama = $request->nilai_tes_agama;
    //     $model -> nilai_tes_bindo = $request->nilai_tes_bindo;
    //     $model -> status_kelas = $request->status_kelas;
    //     $model -> data_siswas_id = $id;
    //     $model->save();


    //     return redirect()->route('lihatsiswa')->with('pesan', 'Nilai Siswa Berhasil di Tambahkan!!!');
    // }    

}
