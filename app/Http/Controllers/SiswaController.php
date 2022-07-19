<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\ImportData;
use App\Models\NilaiTes;
use Illuminate\Contracts\Support\ValidatedData;

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

        return view('siswa.isitambahsis', [
            'title' => 'Tambah Data Siswa'
            
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
    
        $validatedData = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
            'data_siswas_nis' => 'required',
            'nilai_tes_mtk' => 'required','numeric',
            'nilai_tes_ipa' => 'required', 'numeric',
            'nilai_tes_agama' => 'required', 'numeric',
            'nilai_tes_bindo' => 'required', 'numeric',
            'status_kelas' => 'required',
        ],[
                'nama.required' => 'Nama wajib diisi!',
                'nis.required' => 'NIS wajib diisi!',
                'nis.unique' => 'NIS ini sudah ada!',
                'nis.min' => 'NIS minimal 9 karakter!',
                'nis.max' => 'NIS minimal 9 karakter!',
                'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
                'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
                'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
                'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
                'nilai_tes_agama.required' => 'Nilai wajib diisi!',
                'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
                'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
                'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
                'status_kelas.required' => 'Kelas wajib diisi!',
            ]
    );

        $validatedData['users_id'] = auth()->user()->id;
        
        DataSiswa::create($validatedData);
        NilaiTes::create($validatedData);

        return redirect('/inputsiswa/lihatsiswa')->with('success','Berhasil di Tambahkan !');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsis(DataSiswa $datasiswa, NilaiTes $nilaites) 
    {

        $data_siswas = DataSiswa::with('nilai_tes')->get();
        $nilai_tes = NilaiTes::with('data_siswas')->get();
        // $data = DataSiswa::join('nilai_tes', 'nilai_tes.nis', '=', 'data_siswa.nis')
        //                     ->get(['data_siswas'.'nis,nama,status_kelas', 'nilai_tes'.'nilai_tes_mtk,nilai_tes_ipa,nilai_tes_agama,nilai_tes_bindo']);

        return view('siswa.isilihatsis', compact('data_siswas', 'nilai_tes'),
        [
            'title' => 'Edit Data Siswa'
            ]
        );
    }

    public function details(DataSiswa $nis, NilaiTes $id)
    {
        $detail_s = [
            'lihat_sis' => $this->DataSiswa->detailsis($nis),
        ];

        $detail_n = [
            'lihat_nil' => $this->NilaiTes->lihatnilai($id),
        ];

        return view('siswa.isidetailsis', $detail_s, $detail_n

        );
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
        DataSiswa::destroy($datasiswa->nis);
        NilaiTes::destroy($nilaites->id);
        
        return redirect('/inputsiswa/lihatsiswa')->with('success','Berhasil di hapus!');
        // return view('siswa.isihapussis' , [
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
