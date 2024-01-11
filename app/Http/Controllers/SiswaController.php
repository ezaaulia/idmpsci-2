<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use C45\C45;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Menampilkan halaman formulir untuk membuat data siswa baru.
     *
     * @return \Illuminate\View\View
     */
    public function tambahsis()
    {   
        return view('siswa.isitambahsis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function save(Request $request)
    {
    // Validasi data siswa
    $this->validate($request, [
        'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
        'nama' => 'required',
        'asal' => 'required',
        'nilai_tes_mtk' => 'required',
        'nilai_tes_ipa' => 'required',
        'nilai_tes_agama' => 'required',
        'nilai_tes_bindo' => 'required',
        'kelas' => 'required'
    ],[
        'nis.required' => 'NIS wajib diisi!',
        'nis.unique' => 'NIS ini sudah ada!',
        'nis.min' => 'NIS minimal 9 karakter!',
        'nis.max' => 'NIS maksimal 10 karakter!',
        'nama.required' => 'Nama wajib diisi!',
        'asal.required' => 'Asal Sekolah wajib diisi!',
        'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
        'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
        'nilai_tes_agama.required' => 'Nilai wajib diisi!',
        'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
        'kelas.required' => 'Kelas wajib diisi!',
    ]);

    // Memuat model pohon keputusan C45
    $filename = public_path('/csv/Data_Training.csv');
    $c45 = new C45([
        'targetAttribute' => 'hasil_mining',
        'trainingFile' => $filename,
        'splitCriterion' => C45::SPLIT_GAIN,
    ]);

    $tree = $c45->buildTree();

    // Data yang akan diklasifikasikan
    $data = [
        'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
        'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
        'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
        'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
    ];

    // Melakukan klasifikasi menggunakan pohon keputusan C45
    $hasil = $tree->classify($data);
    
    // Membuat data siswa baru dalam database
    DataSiswa::create([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'asal' => $request->asal,
        'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
        'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
        'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
        'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
        'kelas' => $request->kelas,
        'hasil_mining' => $hasil,
    ]);
    
    return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Tambahkan!!!');

    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsis(Request $request) 
    {
        
        return view('siswa.isilihatsis',
        [
            'lhtsiswa' =>  DataSiswa::latest()->filter(request(['search']))->paginate(15),
            ]
        );
    }
    
    /**
     * Menampilkan halaman detail data siswa tertentu.
     *
     * @param  \App\Model\DataSiswa  $data
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DataSiswa::findorFail($id); 
        
        return view('siswa.isidetailsis', 
        [
            'data' => $data,
        ]);
    }

    /**
     * Menampilkan halaman formulir untuk mengedit data siswa tertentu.
     *
     * @param  \App\Model\DataSiswa  $siswa
     * @return \Illuminate\View\View
     */
    public function editsis(DataSiswa $siswa)
    {
        return view('siswa.isieditsis', compact('siswa'));
    }

    
    /**
     * Mengupdate data siswa yang telah ada dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        
        // Validasi data siswa yang diupdate
        $this->validate($request, [
            'nama' => 'required',
            'asal' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'asal.required' => 'Asal Sekolah wajib diisi!',
        ]);

        // Mengambil data siswa yang akan diupdate
        $data_siswa = DataSiswa::findOrFail($id);

        // Mengupdate data siswa
        $data_siswa->nama = $request->nama;
        $data_siswa->asal = $request->asal;
        $data_siswa->save();
        
        
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
        // Hapus data siswa terlebih dahulu
        $siswa = DataSiswa::findOrFail($id);

        // Menghapus data siswa
        $siswa->delete();

        return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Hapus!!!');
        
    }


}
