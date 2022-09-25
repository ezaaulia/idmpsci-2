<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\ImportData;
use App\Models\NilaiTes;

class NilaiController extends Controller
{
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

    public function __construct()
    {
        $this->DataSiswa = new DataSiswa();
        $this->NilaiTes = new NilaiTes();
    }

    public function tambahnil()
    {   
        // $data_siswas = DB::table('data_siswas')
        //             ->join('nilai_tes', 'nilai_tes.id', '=', 'data_siswas.nilaites_id')
        //             ->get();

        // $nilaites = DB::table('nilai_tes')
        //              ->get();


        return view('siswa.isitambahnil', [
            // 'data_siswas' => $data_siswas,
            // 'nilai_tes' => $nilaites,
            'title' => 'Tambah Nilai Siswa'
            
            ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request)
    {
        
        // dd($request->all());
    
        Request()->validate([
            'nilai_tes_mtk' => 'required','numeric',
            'nilai_tes_ipa' => 'required', 'numeric',
            'nilai_tes_agama' => 'required', 'numeric',
            'nilai_tes_bindo' => 'required', 'numeric',
            'status_kelas' => 'required',
        ],[
                'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
                'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
                'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
                'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
                'nilai_tes_agama.required' => 'Nilai wajib diisi!',
                'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
                'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
                'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
                'status_kelas.required' => 'Kelas wajib diisi!',
        ]);

        $datanil = [
           'nilai_tes_mtk' => Request()->nilai_tes_mtk,
           'nilai_tes_ipa' => Request()->nilai_tes_ipa,
           'nilai_tes_agama' => Request()->nilai_tes_agama,
           'nilai_tes_bindo' => Request()->nilai_tes_bindo,
           'status_kelas' => Request()->status_kelas,
        ];


        $this->NilaiTes->addNilai($datanil);
        return redirect()->route('lihatsiswa')->with('pesan', 'Nilai Siswa Berhasil di Tambahkan!!!');
    }    


    // public function detailn($id) //NilaiTes $nilaites
    // {
    //     // $detail_s = [
    //     //     'lihat_sis' => $this->DataSiswa->detailSis($id),
    //     // ];

    //     // $detail_n = [
    //     //     'lihat_nil' => $this->NilaiTes->detailNil($id),
    //     // ];
    //     $lihatnil = $this->NilaiTes->detailNil($id);


    //     return view('siswa.isidetailsis', 
    //     [
    //         'title' => 'Detail Data Siswa', 
    //         'lihatnil' => $lihatnil,
    //     ]);
    // }


}
