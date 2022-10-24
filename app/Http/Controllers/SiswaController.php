<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\NilaiTes;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\DataImport;



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
        $siswa = new DataSiswa; 

        return view('siswa.isitambahsis',
        [   
            'siswa' => $siswa,
            'title' => 'Tambah Data Siswa'
        ]
    );
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
            'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
            'nama' => 'required',
            'asal' => 'required',
        ],[
            'nis.required' => 'NIS wajib diisi!',
            'nis.unique' => 'NIS ini sudah ada!',
            'nis.min' => 'NIS minimal 9 karakter!',
            'nis.max' => 'NIS maksimal 10 karakter!',
            'nama.required' => 'Nama wajib diisi!',
            'asal.required' => 'Asal Sekolah wajib diisi!',
        ]);
        

        $siswa = new DataSiswa;
        $siswa -> nis = $request -> nis;
        $siswa -> nama = $request -> nama;
        $siswa -> asal = $request -> asal;
        $siswa->save();

        return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Tambahkan!!!');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsis() 
    {

        $lhtsiswa = DataSiswa::all();

        return view('siswa.isilihatsis',
        [
            'lhtsiswa' => $lhtsiswa,
            'title' => 'Lihat Data Siswa'
        ]
        );
    }

    public function details($id) //NilaiTes $nilaites
    {

        // if (!$this->DataSiswa->detailSis($id)) {
        //     abort(404);
        // }


        $lihatsis = DataSiswa::find($id);
        $lihatnil = NilaiTes::where('data_siswas_id', $lihatsis->id)->first();


        // return DataSiswa::all();
        return view('siswa.isidetailsis', 
        [
            'lihatsis' =>$lihatsis,
            'lihatnil' => $lihatnil,
            'title' => 'Detail Data Siswa', 
        ]);
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

        
        $edits = DataSiswa::find($id);
        $editn = NilaiTes::where('data_siswas_id', $edits->id)->first();

        return view('siswa.isieditsis',
        [
            // 'idsiswa' => $id,
            'edits' => $edits, 
            'editn' => $editn,
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
    public function update(Request $request, $id)
    {
        Request()->validate([
            // 'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
            'nama' => 'required',
            'asal' => 'required',
            'nilai_tes_mtk' => 'required','numeric',
            'nilai_tes_ipa' => 'required', 'numeric',
            'nilai_tes_agama' => 'required', 'numeric',
            'nilai_tes_bindo' => 'required', 'numeric',
            'status_kelas' => 'required',
        ],[
            // 'nis.required' => 'NIS wajib diisi!',
            // 'nis.unique' => 'NIS ini sudah ada!',
            // 'nis.min' => 'NIS minimal 9 karakter!',
            // 'nis.max' => 'NIS maksimal 10 karakter!',
            'nama.required' => 'Nama wajib diisi!',
            'asal.required' => 'Asal Sekolah wajib diisi!',
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
        
        $edits = DataSiswa::find($id);
        $editn = NilaiTes::where('data_siswas_id', $edits->id)->first();

        $edits->nama = $request->nama;
        $edits->asal = $request->asal;
        $edits->update();

        $editn -> nilai_tes_mtk = $request->nilai_tes_mtk;
        $editn -> nilai_tes_ipa = $request->nilai_tes_ipa;
        $editn -> nilai_tes_agama = $request->nilai_tes_agama;
        $editn -> nilai_tes_bindo = $request->nilai_tes_bindo;
        $editn -> status_kelas = $request->status_kelas;
        // $editn -> data_siswas_id = $id;
        $editn->update();
        
        return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Edit!!!');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = DataSiswa::find($id);
        $hapus-> nilai_tes -> delete();
        $hapus -> delete();
        
        // $hapus = NilaiTes::where("data_siswas_id", $hapus->id)->delete();

        return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Hapus!!!');

    }

    public function export()
    {
        return Excel::download(new DataExport, 'datasiswa.xlsx');
    }

    // public function import(Request $request)
    // {
    //     $data = $request->file('file');
    //     $namafile = $data->getClientOriginalName();
    //     $data->move('DataSiswa', $namafile);

    //     Excel::import(new DataImport, public_path('/DataSiswa/'.$namafile));

    //     return redirect('importdata');
    // }

    public function import(Request $request)
{
        Excel::import(new DataImport, $request->file);

        return redirect()->route('importdata');
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
