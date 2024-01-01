<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTesting;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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

        $tes = DataTesting::all(); // Mengambil semua data dari tabel DataTesting

        // Menghitung jumlah total data dari tabel yang diinginkan
        $totalCount = DB::table('data_testing')->count();

        //Memanggil data aktual dan prediksi dari databese
        $actualLabels = DataTesting::pluck('status_kelas')->toArray();
        $predictedLabels = DataTesting::pluck('hasil_mining')->toArray();

        // Merubah huruf kapital menjadi kecil
        $actualLabelsLower = array_map('strtolower', $actualLabels);
        $predictedLabelsLower = array_map('strtolower', $predictedLabels);
        

    
        $accuracy = $this->accuracy($actualLabelsLower, $predictedLabelsLower);
        $errorRate = $this->errorRate($actualLabelsLower, $predictedLabelsLower);
        // $precision = $this->precision($actualLabelsLower, $predictedLabelsLower);
        // $recall = $this->recall($actualLabelsLower, $predictedLabelsLower);
        // $specificity = $this->specificity($actualLabelsLower, $predictedLabelsLower);
        // $f1Score = $this->f1Score($precision, $recall);


        // Menghitung jumlah prediksi yang tepat dan tidak tepat
        $correctPredictions = 0;
        $incorrectPredictions = 0;

        foreach ($actualLabelsLower as $key => $actualLabel) {
            if ($actualLabel == $predictedLabelsLower[$key]) {
                $correctPredictions++;
            } else {
                $incorrectPredictions++;
            }
        }


        // Menampilkan metrik kinerja
        return view('mining.isipengujian', compact( 'tes', 'totalCount', 'accuracy', 'errorRate', 'correctPredictions', 'incorrectPredictions' ));

        // return view('mining.isipengujian', compact( 'tes', 'totalCount', 'accuracy', 'errorRate', 'precision', 'recall', 'specificity', 'f1Score', 'correctPredictions', 'incorrectPredictions' ));
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


    // private function precision($actual, $predicted)
    // {
    //     // Implementasi perhitungan presisi
    //     $truePositives = 0;
    //     $falsePositives = 0;

    //     foreach ($actual as $index => $row) {
    //         if ($row == $predicted[$index]) {
    //             $truePositives++;
    //         } else {
    //             $falsePositives++;
    //         }
    //     }

    //     $precision = $truePositives / ($truePositives + $falsePositives);

    //     // Memformat nilai akurasi dengan dua angka di belakang koma
    //     $formattedPrecision = number_format($precision, 2);

    //     return $formattedPrecision;
    // }

    // private function recall($actual, $predicted)
    // {
    //     // Implementasi perhitungan recall
    //     $truePositives = 0;
    //     $falseNegatives = 0;

    //     foreach ($actual as $index => $row) {
    //         if ($row == $predicted[$index]) {
    //             $truePositives++;
    //         } else {
    //             $falseNegatives++;
    //         }
    //     }

    //     $recall = $truePositives / ($truePositives + $falseNegatives);

    //     // Memformat nilai akurasi dengan dua angka di belakang koma
    //     $formattedRecall = number_format($recall, 2);

    //     return $formattedRecall;
    // }

    // private function specificity($actual, $predicted)
    // {
    //     // Implementasi perhitungan specificity
    //     $trueNegatives = 0;
    //     $falsePositives = 0;

    //     foreach ($actual as $index => $row) {
    //         if ($row == $predicted[$index]) {
    //             $trueNegatives++;
    //         } else {
    //             $falsePositives++;
    //         }
    //     }

    //     $specificity = $trueNegatives / ($trueNegatives + $falsePositives);

    //     // Memformat nilai akurasi dengan dua angka di belakang koma
    //     $formattedSpecificity = number_format($specificity, 2);

    //     return $formattedSpecificity;
    // }

    // private function f1Score($precision, $recall)
    // {
    //     // Implementasi perhitungan F1 Score
    //     $f1Score = 2 * ($precision * $recall) / ($precision + $recall);

    //     return $f1Score;
    // }

    /**
     * Menghasilkan file PDF dari daftar status siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {

        $siswa = DataTesting::all();

        $pdf = Pdf::loadView('mining.hasilmining', compact('siswa'));
        return $pdf->download('hasil_klasifikasi.pdf');

    }
}