<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class DataTestingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tes
     * @return \Illuminate\Http\Response
     */
    public function ujidata(Request $request)
    {

        // Mengambil semua data dari tabel DataSiswa
        $allData = DataSiswa::all(); 

        // Menghitung jumlah total data dari tabel yang diinginkan
        $totalCount = DataSiswa::count();

        //Memanggil data aktual dan prediksi dari databese
        $actualLabels = DataSiswa::pluck('kelas')->toArray();
        $predictedLabels = DataSiswa::pluck('hasil_mining')->toArray();

        // Merubah huruf kapital menjadi kecil
        $actualLabelsLower = array_map('strtolower', $actualLabels);
        $predictedLabelsLower = array_map('strtolower', $predictedLabels);

        // Menghitung akurasi dan error rate
        $accuracy = $this->accuracy($actualLabelsLower, $predictedLabelsLower);
        $errorRate = $this->errorRate($actualLabelsLower, $predictedLabelsLower);

        // Menyiapkan array untuk menyimpan data yang diprediksi salah
        $incorrectData = [];

        // Menghitung jumlah prediksi yang tepat dan tidak tepat
        $correctPredictions = 0;
        $incorrectPredictions = 0;

        foreach ($allData as $key => $data) {
            if ($actualLabelsLower[$key] != $predictedLabelsLower[$key]) {
                $incorrectPredictions++;
                $incorrectData[] = $data; // Menyimpan data yang diprediksi salah
            } else {
                $correctPredictions++;
            }
        }

        
        // Menampilkan metrik kinerja
        return view('mining.isipengujian', compact('allData', 'totalCount', 'accuracy', 'errorRate', 'correctPredictions', 'incorrectPredictions', 'incorrectData'));

    }



    private function accuracy($actual, $predicted)
    {
        // Menghitung jumlah sampel
        $totalSamples = count($actual);

        // Inisialisasi jumlah prediksi yang benar
        $correctPredictions = 0;

        // Menghitung prediksi yang benar
        for ($i = 0; $i < $totalSamples; $i++) {
            if ($actual[$i] == $predicted[$i]) {
                $correctPredictions++;
            }
        }

        $accuracy = ($correctPredictions / $totalSamples) * 100;
        
        // Memformat nilai akurasi dengan dua angka di belakang koma
        $formattedAccuracy = number_format($accuracy, 2);

        return $formattedAccuracy;
    }

    private function errorRate($actual, $predicted)
    {
        // Menghitung jumlah sampel
        $totalSamples = count($actual);

        // Inisialisasi jumlah prediksi yang salah
        $incorrectPredictions = 0;

        // Menghitung prediksi yang salah
        for ($i = 0; $i < $totalSamples; $i++) {
            if ($actual[$i] != $predicted[$i]) {
                $incorrectPredictions++;
            }
        }

        // Menghitung laju error
        $errorRate = ($incorrectPredictions / $totalSamples) * 100;

        // Memformat nilai laju error dengan dua angka di belakang koma
        $formattedErrorRate = number_format($errorRate, 2);

        return $formattedErrorRate;
    }


    /**
     * Menghasilkan file PDF dari daftar status siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {

        $siswa = DataSiswa::all();

        $pdf = Pdf::loadView('mining.hasilmining', compact('siswa'));
        return $pdf->download('hasil_klasifikasi.pdf');

    }
}