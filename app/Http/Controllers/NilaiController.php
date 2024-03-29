<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\ImportData;
use App\Models\NilaiTes;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\C45;
use C45\C45;
use C45\C45 as C45AJA;

class NilaiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar data siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatnilai(Request $request)
    {
        $data_siswas = DataSiswa::all();
        
        return view('nilai.isilihatnilai',
        [
            'data_siswas' => $data_siswas,
            'lhtnilai' =>  DataSiswa::latest()->filter(request(['search']))->paginate(15),
        ]
        );
    }


    /**
     * Menampilkan halaman formulir untuk mengedit data nilai tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editnil($id)
    {
        $nilai = DataSiswa::findOrFail($id);

        return view('nilai.editnil', compact('nilai'));
    
    }

    
    /**
     * Mengupdate data nilai siswa dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        
         // Validasi data nilai siswa yang diupdate
         $this->validate($request, [
            'nilai_tes_mtk' => 'required',
            'nilai_tes_ipa' => 'required', 
            'nilai_tes_agama' => 'required', 
            'nilai_tes_bindo' => 'required', 
            'kelas' => 'required',
        ],[
            'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
            'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
            'nilai_tes_agama.required' => 'Nilai wajib diisi!',
            'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
            'kelas.required' => 'Kelas wajib diisi!',
        ]);

        // Mengambil data nilai siswa yang akan diupdate
        $nilai = DataSiswa::find($id);

        // Memuat model pohon keputusan C45AJA
        $filename = storage_path('app/csv/Data_Training.csv');
        $c45 = new C45AJA([
            'targetAttribute' => 'hasil_mining',
            'trainingFile' => $filename,
            'splitCriterion' => C45AJA::SPLIT_GAIN,
        ]);
        $tree = $c45->buildTree();
        // $treeString = $tree->toString();

        // Data yang akan diklasifikasikan
        $data = [
            'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
            'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
            'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
            'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
        ];

        // Melakukan klasifikasi menggunakan pohon keputusan C45
        $hasil = $tree->classify($data);
        
        // Mengupdate data nilai siswa
        $nilai -> hasil_mining = $hasil;
        $nilai -> nilai_tes_mtk = strtoupper($request->nilai_tes_mtk);
        $nilai -> nilai_tes_ipa = strtoupper($request->nilai_tes_ipa);
        $nilai -> nilai_tes_agama = strtoupper($request->nilai_tes_agama);
        $nilai -> nilai_tes_bindo = strtoupper($request->nilai_tes_bindo);
        $nilai -> kelas = $request->kelas;
        $nilai->save();


        return redirect()->route('lihatnilai')->with('pesan', 'Nilai Siswa Berhasil di Edit!!!');
    }    

}
