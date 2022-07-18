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

    // public function __construct()
    // {
    //     $this->DataSiswa = new DataSiswa();
    //     $this->NilaiTes = new NilaiTes();
    // }

    public function tambahsis()
    {

        return view('siswa.isitambahsis', [
            'title' => 'Tambah Data Siswa'
            
            ]);

        

        // $datasiswa = DataSiswa::latest()->paginate(5);
        // return view('siswa.isitambahsis', compact('siswa'))
        // ->with('i', (request()->input('page', 1) - 1) *5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DataSiswa::create($request->all());
        // NilaiTes::create($request->all());

    
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'nama' => 'required',
        //     'id' => 'required|unique:data_siswas,id|min:9|max:10',
        //     'nilai_tes_mtk' => 'required','numeric',
        //     'nilai_tes_ipa' => 'required', 'numeric',
        //     'nilai_tes_agama' => 'required', 'numeric',
        //     'nilai_tes_bindo' => 'required', 'numeric',
        //     'status_kelas' => 'required',
        // ]);

        
        // $validatedData['data_siswas_id'] = auth()->data_siswa()->id;
        // $validatedData['users_id'] = auth()->user()->id;
        
        // DataSiswa::create($validatedData);
        // NilaiTes::create($validatedData);
        // return $request;


        Request()->validate([
            'nama' => 'required',
            'id' => 'required|unique:data_siswas,id|min:9|max:10',
            'nilai_tes_mtk' => 'required','numeric',
            'nilai_tes_ipa' => 'required', 'numeric',
            'nilai_tes_agama' => 'required', 'numeric',
            'nilai_tes_bindo' => 'required', 'numeric',
            'status_kelas' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'id.required' => 'NIS wajib diisi!',
            'id.unique' => 'NIS ini sudah ada!',
            'id.min' => 'NIS minimal 9 karakter!',
            'id.max' => 'NIS minimal 9 karakter!',
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

        $inserts = [
            'nama' => Request()->nama,
            'id' => Request()->id,
            'nilai_tes_mtk' => Request()->nilai_tes_mtk,
            'nilai_tes_ipa' => Request()->nilai_tes_ipa,
            'nilai_tes_agama' => Request()->nilai_tes_agama,
            'nilai_tes_bindo' => Request()->nilai_tes_bindo,
            'status_kelas' => Request()->status_kelas,
        ];
        $this->DataSiswa->insertSis($inserts);

        $insertn = [
            'nilai_tes_mtk' => Request()->nilai_tes_mtk,
            'nilai_tes_ipa' => Request()->nilai_tes_ipa,
            'nilai_tes_agama' => Request()->nilai_tes_agama,
            'nilai_tes_bindo' => Request()->nilai_tes_bindo,
        ];

       
        $this->DataSiswa->insertNil($insertn);

         return redirect('/inputsiswa/tambahsiswa')->with('success','Berhasil di Tambahkan !');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsis(DataSiswa $datasiswa, NilaiTes $nilaites) 
    {
        $data_s = [
            'siswa' => $this->DataSiswa->allData(),
        ];

        $data_n = [
            'nilai' => $this->NilaiTes->allData(),
        ];

        return view('siswa.isilihatsis', $data_s,  $data_n
        // [
        //     "title" => "Edit Data Siswa"
        //     ]
        );
    }

    public function lihat_s(DataSiswa $id, NilaiTes $users_id)
    {
        $detail_s = [
            'lihat_sis' => $this->DataSiswa->lihatsiswa($id),
        ];

        $detail_n = [
            'lihat_nil' => $this->NilaiTes->lihatnilai($users_id),
        ];

        return view('siswa.isidetailsis', $detail_s, $detail_n

        );
    }

    public function __construct()
    {
        $this->DataSiswa = new DataSiswa();
        $this->NilaiTes = new NilaiTes();

        
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
    public function hapussis(DataSiswa $datasiswa)
    {
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
