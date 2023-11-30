<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
// use Barryvdh\DomPDF\PDF;
use App\Models\DataSiswa;
use App\Models\Data;
use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Imports\DataImport2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use C45\C45;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\DataTraining;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Support\ValidatedData;
use PDF;

class SiswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('data_siswas')
                    ->join('nilai_tes', 'nilai_tes.id', '=', 'data_siswas.id')
                    ->get();

        return view('mining.isimining_data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function tambahsis()
    {   
        // $sis = DataSiswa::with('nilai_tes')->get();
        // $nil = NilaiTes::with('data_siswas')->get();

        return view('siswa.isitambahsis',
        [   
            // 'sis' => $sis, 
            // 'nil' => $nil,
            // 'hasil' => $hasilmining,
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
    // Validasi data siswa
    $this->validate($request, [
        'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
        'nama' => 'required',
        'asal' => 'required',
        'nilai_tes_mtk' => 'required',
        'nilai_tes_ipa' => 'required',
        'nilai_tes_agama' => 'required',
        'nilai_tes_bindo' => 'required',
        'status_kelas' => 'required'
    ],[
        'nis.required' => 'NIS wajib diisi!',
        'nis.unique' => 'NIS ini sudah ada!',
        'nis.min' => 'NIS minimal 9 karakter!',
        'nis.max' => 'NIS maksimal 10 karakter!',
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
        // Validasi data siswa
        // Request()->validate([
        //     'nis' => 'required|unique:data_siswas,nis|min:9|max:10',
        //     'nama' => 'required',
        //     'asal' => 'required',
        //     'nilai_tes_mtk' => 'required',
        //     'nilai_tes_ipa' => 'required',
        //     'nilai_tes_agama' => 'required',
        //     'nilai_tes_bindo' => 'required',
        //     'status_kelas' => 'required',
        // ],[
        //     'nis.required' => 'NIS wajib diisi!',
        //     'nis.unique' => 'NIS ini sudah ada!',
        //     'nis.min' => 'NIS minimal 9 karakter!',
        //     'nis.max' => 'NIS maksimal 10 karakter!',
        //     'nama.required' => 'Nama wajib diisi!',
        //     'asal.required' => 'Asal Sekolah wajib diisi!',
        //     'nilai_tes_mtk.required' => 'Nilai wajib diisi!',
        //     'nilai_tes_mtk.numemric' => 'Nilai wajib angka!',
        //     'nilai_tes_ipa.required' => 'Nilai wajib diisi!',
        //     'nilai_tes_ipa.numemric' => 'Nilai wajib angka!',
        //     'nilai_tes_agama.required' => 'Nilai wajib diisi!',
        //     'nilai_tes_agama.numemric' => 'Nilai wajib angka!',
        //     'nilai_tes_bindo.required' => 'Nilai wajib diisi!',
        //     'nilai_tes_bindo.numemric' => 'Nilai wajib angka!',
        //     'status_kelas.required' => 'Kelas wajib diisi!',
        // ]);


        // Memuat model pohon keputusan C45
        $filename = public_path('csv/Data_Training.csv');
        $c45 = new C45([
            'targetAttribute' => 'hasil_mining',
            'trainingFile' => $filename,
            'splitCriterion' => C45::SPLIT_GAIN,
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

        // dd($tree);
        // Membuat data siswa baru dalam database
        DataSiswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'asal' => $request->asal,
            'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
            'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
            'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
            'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
            'status_kelas' => strtoupper($request->status_kelas),
            'hasil_mining' => $hasil,
        ]);
        // // Membuat data siswa baru ke dalam database DataSiswa
        // $sis = new DataSiswa;
        // $sis ->nis = $request->nis;
        // $sis->nama = $request->nama;
        // $sis->asal = $request->asal;
        // $sis->save();

        // // Membuat data siswa baru ke dalam database NilaiTes
        // $nil = new NilaiTes;
        // $nil -> data_siswas_id = $sis->id;
        // $nil -> nilai_tes_mtk = strtoupper($request->nilai_tes_mtk);
        // $nil -> nilai_tes_ipa = strtoupper($request->nilai_tes_ipa);
        // $nil -> nilai_tes_agama = strtoupper($request->nilai_tes_agama);
        // $nil -> nilai_tes_bindo = strtoupper($request->nilai_tes_bindo);
        // $nil -> status_kelas = strtoupper($request->status_kelas);
        // $nil -> hasil_mining = ($request->$hasil);
        // $nil->save();

        // $hasil_mining = new DataTraining();
        // $hasil_mining -> hasil_mining = $request->hasil_mining;

        return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Tambahkan!!!');
    }    

    public function lihatnilai(Request $request)
    {

        return view('siswa.isilihatnilai',
        [
            'lhtnilai' =>  DataSiswa::latest()->filter(request(['search']))->paginate(15),
            'title' => 'Lihat Data Nilai'
        ]
        );
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
            'title' => 'Lihat Data Siswa'
        ]
        );
    }
    
    
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function editsis(Request $request, $id)
    // {
        
    //     $edits = DataSiswa::find($id);
    //     $editn = NilaiTes::where('data_siswas_id', $edits->id)->first();

    //     return view('siswa.isieditsis',
    //     [
    //         'edits' => $edits, 
    //         'editn' => $editn,
    //         'title' => 'Edit Data Siswa', 
    //     ]
    //     );
    // }

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
        Request()->validate([
            'nama' => 'required',
            'asal' => 'required',
            // 'nilai_tes_mtk' => 'required','numeric',
            // 'nilai_tes_ipa' => 'required', 'numeric',
            // 'nilai_tes_agama' => 'required', 'numeric',
            // 'nilai_tes_bindo' => 'required', 'numeric',
            // 'status_kelas' => 'required',
        ],[
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
        ]);

        // Memuat model pohon keputusan C45
        $filename = public_path('/csv/Data_Training.csv');
        $c45 = new C45([
            'targetAttribute' => 'hasil_mining',
            'trainingFile' => $filename,
            'splitCriterion' => C45::SPLIT_GAIN,
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

        // Mengambil data siswa yang akan diupdate
        $siswa = DataSiswa::findOrFail($id);

        // Mengupdate data siswa
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->save();
        // $edits = DataSiswa::find($id);
        // $editn = NilaiTes::where('data_siswas_id', $edits->id)->first();

        // $edits->nama = $request->nama;
        // $edits->asal = $request->asal;
        // $edits->update();

        // $editn -> nilai_tes_mtk = strtoupper($request->nilai_tes_mtk);
        // $editn -> nilai_tes_ipa = strtoupper($request->nilai_tes_ipa);
        // $editn -> nilai_tes_agama = strtoupper($request->nilai_tes_agama);
        // $editn -> nilai_tes_bindo = strtoupper($request->nilai_tes_bindo);
        // $editn -> status_kelas = strtoupper($request->status_kelas);
        // $editn -> hasil_mining = $hasil;
        // $editn->update();
        
        
        return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Edit!!!');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Hapus nilai terlebih dahulu
        NilaiTes::where('data_siswas_id', $id)->delete();

        // Hapus data siswa
        DataSiswa::where('id', $id)->delete();

        return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Hapus!!!');
        
    }

    // public function import()
    // {
        
    //     $datas = DB::table('data_siswas')
    //                 ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
    //                 ->get();

    //     return view('siswa.isiimportsis', [
    //         'datas' => $datas,
    //         'title' => 'Import Data'
    //         ]);
    // }

    public function upload(Request $request)
    {
        
        Excel::import(new DataImport(), $request->file(key:'import_file'));

        return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Upload!!!');
    }

    public function export()
    {
        return Excel::download(new DataExport, 'datasiswa.pdf');
    }

    public function exportPDF()
    {
        // $pdf = App::make('lihatsiswa');
        // $pdf->loadHTML('tes');
        // return $pdf->stream();
    //     $datas = DataSiswa::all();
 
	//     view()->share('datas', $datas);
    //     $pdf = PDF::loadview('siswa.isipdf');
    //     return $pdf->download('datasiswa.pdf');
    }

}
