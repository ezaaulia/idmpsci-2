<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\ImportData;
use App\Models\NilaiTes;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;




class SiswaController extends Controller
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

    public function tambahsis()
    {   
        // $data_siswas = DB::table('data_siswas')
        //             ->join('nilai_tes', 'nilai_tes.id', '=', 'data_siswas.nilaites_id')
        //             ->get();

        // $nilaites = DB::table('nilai_tes')
        //              ->get();


        return view('siswa.isitambahsis', [
            // 'data_siswas' => $data_siswas,
            // 'nilai_tes' => $nilaites,
            'title' => 'Tambah Data Siswa'
            
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
    
        $validatedData = $request->validate([
            'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
            'nama' => 'required',
            'asal' => 'required',
            // 'data_siswas_nis' => 'required',
            // 'nilai_tes_mtk' => 'required','numeric',
            // 'nilai_tes_ipa' => 'required', 'numeric',
            // 'nilai_tes_agama' => 'required', 'numeric',
            // 'nilai_tes_bindo' => 'required', 'numeric',
            // 'status_kelas' => 'required',
        ],[
                'nis.required' => 'NIS wajib diisi!',
                'nis.unique' => 'NIS ini sudah ada!',
                'nis.min' => 'NIS minimal 9 karakter!',
                'nis.max' => 'NIS maksimal 10 karakter!',
                'nama.required' => 'Nama wajib diisi!',
                'asal.required' => 'Asal Sekolah wajib diisi!',
                // 'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
                // 'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
                // 'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
                // 'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
                // 'nilai_tes_agama.required' => 'Nilai wajib diisi!',
                // 'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
                // 'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
                // 'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
                // 'status_kelas.required' => 'Kelas wajib diisi!',
            ]
    );
        
        // DataSiswa::create($validatedData);
        // NilaiTes::create($validatedData);

        $datasis = [
           'nis' => Request()->nis,
           'nama' => Request()->nama,
           'asal' => Request()->asal,
        //    'nilai_tes_mtk' => Request()->nilai_tes_mtk,
        //    'nilai_tes_ipa' => Request()->nilai_tes_ipa,
        //    'nilai_tes_agama' => Request()->nilai_tes_agama,
        //    'nilai_tes_bindo' => Request()->nilai_tes_bindo,
        //    'status_kelas' => Request()->status_kelas,
        ];

        // $validatedData['users_id'] = auth()->user()->id;

        $this->DataSiswa->addData($datasis);
        return redirect()->route('inputsiswa/lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Tambahkan!!!');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsis(DataSiswa $datasiswa, NilaiTes $nilaites) 
    {

        $datasiswa = [
            'siswa' => $this->DataSiswa->allData(),
        ];
        // $data_siswas = DataSiswa::with('nilai_tes')->get();
        // $nilai_tes = NilaiTes::with('data_siswas')->get();
        // $data = DataSiswa::join('nilai_tes', 'nilai_tes.nis', '=', 'data_siswa.nis')
        //                     ->get(['data_siswas'.'nis,nama,status_kelas', 'nilai_tes'.'nilai_tes_mtk,nilai_tes_ipa,nilai_tes_agama,nilai_tes_bindo']);

        
        return view('siswa.isilihatsis', $datasiswa,
        [
            'title' => 'Lihat Data Siswa'
        ]
        );
    }

    public function details($id) //NilaiTes $nilaites
    {
        $detail_s = [
            'lihat_sis' => $this->DataSiswa->detailSis($id),
        ];

        $detail_n = [
            'lihat_nil' => $this->NilaiTes->detailNil($id),
        ];

        return view('siswa.isidetailsis' , $detail_s , $detail_n , [
            'title' => 'Detail Data Siswa'
        ]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editsis(DataSiswa $datasiswa)
    {
        return view('siswa.isieditsis' , [
            'title' => 'Edit Data Siswa'
            ]);
    }

    public function tambahnil(DataSiswa $datasiswa)
    {
        return view('siswa.isitambahnil' , [
            'title' => 'Tambah Nilai Siswa'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataSiswa $datasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapussis(DataSiswa $datasiswa, NilaiTes $nilaites)
    {
        // DataSiswa::destroy($datasiswa->id);
        // NilaiTes::destroy($nilaites->id);
        
        // return redirect('/inputsiswa/lihatsiswa')->with('success','Berhasil di hapus!');
        // // return view('siswa.isihapussis' , [
        //     'title' => 'Hapus Data Siswa'
        //     ]);
    }

    public function import(Request $request, ImportData $importdata)
    {
        //
    }

    public function carisis(DataSiswa $datasiswa)
    {
        return view('siswa.isicarisis' , [
            'title' => 'Cari Data Siswa'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
