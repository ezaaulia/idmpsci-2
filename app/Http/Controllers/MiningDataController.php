<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HasilTraining;
use Algorithm\C45;
use Algorithm\C45\DataInput;

class MiningDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function mining()
    {
        $data = DB::table('data_siswas')
                    ->join('nilai_tes', 'nilai_tes.id', '=', 'data_siswas.id')
                    ->get();

        return view('mining.hasilmining', compact('data'));
    }
 
    // public function upload()
    // {
    //     return view('upload');
    // }

    // public function processData(Request $request)
    // {
    //     // Ambil data pelatihan dan pengujian dari permintaan
    //     $trainingData = $request->file('training_data');
    //     $testData = $request->file('test_data');

    //     // Proses data dan latih model C4.5 di sini
    //     // Anda dapat menggunakan pustaka Python dan scikit-learn seperti dalam contoh sebelumnya

    //     // Setelah proses pelatihan dan prediksi selesai, tampilkan hasilnya di halaman web
    //     return view('results', [
    //         'predictions' => $predictions, // Hasil prediksi dari model C4.5
    //     ]);
    // }


}
