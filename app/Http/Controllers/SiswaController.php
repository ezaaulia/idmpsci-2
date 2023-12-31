<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use App\Models\DataSiswa;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use C45\C45;
use PDF;
use App\Tree;

class SiswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    /**
     * Menampilkan halaman formulir untuk membuat data siswa baru.
     *
     * @return \Illuminate\View\View
     */
    public function tambahsis()
    {   
        return view('siswa.isitambahsis',
        [   
            'title' => 'Tambah Data Siswa'
        ]);
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
        'status_kelas' => 'required'
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
        'status_kelas.required' => 'Kelas wajib diisi!',
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
    
    // Membuat data siswa baru dalam database
    DataSiswa::create([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'asal' => $request->asal,
        'nilai_tes_mtk' => strtoupper($request->nilai_tes_mtk),
        'nilai_tes_ipa' => strtoupper($request->nilai_tes_ipa),
        'nilai_tes_agama' => strtoupper($request->nilai_tes_agama),
        'nilai_tes_bindo' => strtoupper($request->nilai_tes_bindo),
        // 'status_kelas' => strtoupper($request->status_kelas),
        'status_kelas' => $request->status_kelas,
        'hasil_mining' => $hasil,
    ]);
    // dd($filename);
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
            'title' => 'Lihat Data Siswa'
            ]
        );
    }
    
    // public function lihatnilai(Request $request)
    // {

    //     return view('siswa.isilihatnilai',
    //     [
    //         'lhtnilai' =>  DataSiswa::latest()->filter(request(['search']))->paginate(15),
    //         'title' => 'Lihat Data Nilai'
    //     ]
    //     );
    // }

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
            'title' => 'Detail Data Siswa',
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

        // Mengambil data siswa yang akan diupdate
        $data_siswa = DataSiswa::findOrFail($id);

        // Mengupdate data siswa
        $data_siswa->nama = $request->nama;
        $data_siswa->asal = $request->asal;
        $data_siswa->hasil_mining = $hasil;
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


    // public function upload(Request $request)
    // {
        
    //     Excel::import(new DataImport(), $request->file(key:'import_file'));

    //     return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Upload!!!');
    // }

    // public function delete($filename)
    // {

    //     $file_path = storage_path('app/public/import_csv/' . $filename);

    //     if (File::exists($file_path)) {
    //         File::delete($file_path);
    //         return redirect()->back()->with('success', 'File CSV berhasil dihapus.');
    //     } else {
    //         return redirect()->back()->with('error', 'File CSV tidak ditemukan.');
    //     }
        
    //     // Excel::import(new DataImport(), $request->file(key:'import_file'));

    //     // return redirect('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Upload!!!');
    // }

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
