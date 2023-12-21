<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Imports\DataTest;
use App\Models\DataTesting;
use C45\C45;
use Phpml\Metric\ConfusionMatrix;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;



class DataTestingController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $tes = DataTesting::all();

        $actual = DataTesting::pluck('hasil_mining')->toArray();
        $predicted = DataTesting::pluck('status_kelas')->toArray();
        
        
        // Menghitung metrik kinerja
        $accuracy = $this->accuracy($actual, $predicted);
        $precision = $this->precision($actual, $predicted);
        $recall = $this->recall($actual, $predicted);
        $specificity = $this->specificity($actual, $predicted);
        $f1Score = $this->f1Score($precision, $recall);


    
        // dd($confusionMatrix);

        
        // Menampilkan metrik kinerja
        // return view('mining.isipengujian', compact('transactions', 'truePositive', 'trueNegative', 'falsePositive', 'falseNegative'));
        return view('mining.isipengujian', compact( 'tes','accuracy', 'precision', 'recall', 'specificity', 'f1Score'));
        // return view('mining.isipengujian', compact('confusionMatrix'));


       
    }

    private function accuracy($actual, $predicted)
    {
        // Implementasi perhitungan akurasi
        // $tes = DataTesting::all();

        // $actual = DataTesting::pluck('hasil_mining')->toArray();
        // $predicted = DataTesting::pluck('status_kelas')->toArray();


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
 

        $accuracy = ($totalSamples > 0) ? ($correctPredictions / $totalSamples) * 100 : 0;

        // $accuracy = ($correctPredictions / $totalSamples) * 100;
        
        return $accuracy;
    }

    private function precision($actual, $predicted)
    {
        // Implementasi perhitungan presisi
        $truePositives = $falsePositives = 0;

        for ($i = 0; $i < count($actual); $i++) {
            if ($actual[$i] == 1 && $predicted[$i] == 1) {
                $truePositives++;
            } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
                $falsePositives++;
            }
        }
    
        // Menghindari pembagian dengan nol
        $precision = ($truePositives + $falsePositives > 0) ? ($truePositives / ($truePositives + $falsePositives)) : 0;
    
        return $precision;
    }

    private function recall($actual, $predicted)
    {
        // Implementasi perhitungan recall
        $truePositives = $falseNegatives = 0;

        for ($i = 0; $i < count($actual); $i++) {
            if ($actual[$i] == 1 && $predicted[$i] == 1) {
                $truePositives++;
            } elseif ($actual[$i] == 1 && $predicted[$i] == 0) {
                $falseNegatives++;
            }
        }
    
        // Menghindari pembagian dengan nol
        $recall = ($truePositives + $falseNegatives > 0) ? ($truePositives / ($truePositives + $falseNegatives)) : 0;
    
        return $recall;
    }

    private function specificity($actual, $predicted)
    {
        // Implementasi perhitungan spesifisitas
        $trueNegatives = $falsePositives = 0;

        for ($i = 0; $i < count($actual); $i++) {
            if ($actual[$i] == 0 && $predicted[$i] == 0) {
                $trueNegatives++;
            } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
                $falsePositives++;
            }
        }
    
        // Menghindari pembagian dengan nol
        $specificity = ($trueNegatives + $falsePositives > 0) ? ($trueNegatives / ($trueNegatives + $falsePositives)) : 0;
    
        return $specificity;
    }

    private function f1Score($precision, $recall)
    {
        // Implementasi perhitungan F1 Score

        // Menghindari pembagian dengan nol
        $f1Score = ($precision + $recall > 0) ? (2 * ($precision * $recall) / ($precision + $recall)) : 0;

        return $f1Score;
    }




















    public function calculateConfusionMatrix()
    {
        // Mendapatkan data aktual dan hasil prediksi dari model Anda
        $transactions = DataTesting::all();
        $actual = $transactions->pluck('status_kelas')->toArray();
        $predicted = $transactions->pluck('hasil_mining')->toArray();


        // Inisialisasi variabel untuk confusion matrix
        $truePositive = $trueNegative = $falsePositive = $falseNegative = 0;

        // Menghitung confusion matrix
        for ($i = 0; $i < count($actual); $i++) {
            if ($actual[$i] == 1 && $predicted[$i] == 1) {
                $truePositive++;
            } elseif ($actual[$i] == 0 && $predicted[$i] == 0) {
                $trueNegative++;
            } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
                $falsePositive++;
            } elseif ($actual[$i] == 1 && $predicted[$i] == 0) {
                $falseNegative++;
            }
        }
        // Menyimpan nilai confusion matrix ke dalam array
        // Menghitung metrik kinerja
        $accuracy = $this->accuracy($actual, $predicted);
        $precision = $this->precision($actual, $predicted);
        $recall = $this->recall($actual, $predicted);
        $specificity = $this->specificity($actual, $predicted);
        $f1Score = $this->f1Score($precision, $recall);


        // Menampilkan confusion matrix
        return view('mining.matrix', compact('transactions','truePositive', 'trueNegative', 'falsePositive', 'falseNegative', 'accuracy', 'precision', 'recall', 'specificity', 'f1Score'));
       
        // // Menghitung metrik kinerja
        // $accuracy = $this->accuracy($actualLabels, $predictedLabels);
        // $precision = $this->precision($actualLabels, $predictedLabels);
        // $recall = $this->recall($actualLabels, $predictedLabels);
        // $specificity = $this->specificity($actualLabels, $predictedLabels);
        // $f1Score = $this->f1Score($precision, $recall);
    
        // dd($accuracy);

        // Menampilkan metrik kinerja
        // return view('mining.isipengujian', compact('accuracy', 'precision', 'recall', 'specificity', 'f1Score'));
    
    }



}
