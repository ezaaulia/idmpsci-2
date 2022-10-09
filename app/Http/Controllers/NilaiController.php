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

    public function __construct()
    {
        $this->DataSiswa = new DataSiswa();
        $this->NilaiTes = new NilaiTes();
    }

    // public function detailn($id) //NilaiTes $nilaites
    // {

    //     // if (!$this->DataSiswa->detailSis($id)) {
    //     //     abort(404);
    //     // }
 
    //     // $lihatsis = $this->DataSiswa->detailSis($id);
    //     $lihatnil = $this->NilaiTes->detailNil($id);

    //     // $lihatsis = DataSiswa::find($id);
    //     // $lihatnil = DataSiswa::find($id);

    //     return view('siswa.isidetailsis', 
    //     [
    //         // 'lihatsis' =>$lihatsis,
    //         'lihatnil' => $lihatnil,
    //         'title' => 'Detail Data Siswa', 
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function tambahnil($id)
    {   

        return view('siswa.isitambahnil', [ 
            'idsiswa' => $id,
            'title' => 'Tambah Nilai Siswa'
            ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request, $id)
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

        $model = new NilaiTes();
        $model -> nilai_tes_mtk = $request->nilai_tes_mtk;
        $model -> nilai_tes_ipa = $request->nilai_tes_ipa;
        $model -> nilai_tes_agama = $request->nilai_tes_agama;
        $model -> nilai_tes_bindo = $request->nilai_tes_bindo;
        $model -> status_kelas = $request->status_kelas;
        $model -> data_siswas_id = $id;
        $model->save();

        return redirect()->route('lihatsiswa')->with('pesan', 'Nilai Siswa Berhasil di Tambahkan!!!');
    }    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editsis($id)
    {
        // if (!$this->DataSiswa->detailSis($id)) {
        //     abort(404);
        // }

        // $editn = NilaiTes::find($id);
        
        return view('siswa.isieditsis',
        [
            // 'editn' => $editn,
            'title' => 'Edit Data Siswa', 
        ]
        );
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     Request()->validate([
    //         // 'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
    //         // 'nama' => 'required',
    //         // 'asal' => 'required',
    //         'nilai_tes_mtk' => 'required','numeric',
    //         'nilai_tes_ipa' => 'required', 'numeric',
    //         'nilai_tes_agama' => 'required', 'numeric',
    //         'nilai_tes_bindo' => 'required', 'numeric',
    //         'status_kelas' => 'required',
    //     ],[
    //         // 'nis.required' => 'NIS wajib diisi!',
    //         // 'nis.unique' => 'NIS ini sudah ada!',
    //         // 'nis.min' => 'NIS minimal 9 karakter!',
    //         // 'nis.max' => 'NIS maksimal 10 karakter!',
    //         // 'nama.required' => 'Nama wajib diisi!',
    //         // 'asal.required' => 'Asal Sekolah wajib diisi!',
    //         'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
    //         'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
    //         'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
    //         'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
    //         'nilai_tes_agama.required' => 'Nilai wajib diisi!',
    //         'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
    //         'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
    //         'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
    //         'status_kelas.required' => 'Kelas wajib diisi!',
    //     ]);
        
        
    //     // $edit = NilaiTes::find($id);
    //     // $edit -> nilai_tes_mtk = $request->nilai_tes_mtk;
    //     // $edit -> nilai_tes_ipa = $request->nilai_tes_ipa;
    //     // $edit -> nilai_tes_agama = $request->nilai_tes_agama;
    //     // $edit -> nilai_tes_bindo = $request->nilai_tes_bindo;
    //     // $edit -> status_kelas = $request->status_kelas;
    //     // // $edit -> data_siswas_id = $id;
    //     // $edit->update();

    //     // return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Edit!!!');
    // }

}
