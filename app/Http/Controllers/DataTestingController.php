<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Imports\DataTest;
use App\Models\DataTesting;
use C45\C45;
use Phpml\Metric\ConfusionMatrix;
use Phpml\Metric\ClassificationReport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;



class DataTestingController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    // //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $tes
     * @return \Illuminate\Http\Response
     */
    public function ujidata(Request $request)
    {

        $tes = DataTesting::all();

        // dd($tes);
        return view('mining.isipengujian', compact('tes'));
    }
}
        // $tes = DB::table('data_testing')->get();
        
        // $actualLabels = Datatesting::pluck('hasil_mining')->toArray();
        // $predictedLabels = Datatesting::pluck('status_kelas')->toArray();

        
        // // Inisialisasi variabel untuk confusion matrix
        // $truePositive = $trueNegative = $falsePositive = $falseNegative = 0;

        // // Menghitung confusion matrix
        // for ($i = 0; $i < count($actualLabels); $i++) {
        //     if ($actualLabels[$i] == 1 && $predictedLabels[$i] == 1) {
        //         $truePositive++;
        //     } elseif ($actualLabels[$i] == 0 && $predictedLabels[$i] == 0) {
        //         $trueNegative++;
        //     } elseif ($actualLabels[$i] == 0 && $predictedLabels[$i] == 1) {
        //         $falsePositive++;
        //     } elseif ($actualLabels[$i] == 1 && $predictedLabels[$i] == 0) {
        //         $falseNegative++;
        //     }
        // }
    //     $tes = DB::table('data_testing')->get();

    //     $predicted = $tes->pluck('hasil_mining')->toArray();
    //     $actual = $tes->pluck('status_kelas')->toArray();


    //     // $tes = DataTesting::get(['hasil_mining', 'status_kelas'])->toArray();

    //     // $predicted = array_column($tes, 'predicted');
    //     // $actual = array_column($tes, 'actual');

    //     // $actual = DataTesting::get('status_kelas')->toArray();
    //     // $predicted = DataTesting::get('hasil_mining')->toArray();
        


        // // // Menghitung metrik kinerja
        // $accuracy = $this->accuracy($actualLabels, $predictedLabels);
        // $precision = $this->precision($actualLabels, $predictedLabels);
        // $recall = $this->recall($actualLabels, $predictedLabels);
        // $specificity = $this->specificity($actualLabels, $predictedLabels);
        // $f1Score = $this->f1Score($precision, $recall);
            //    dd($actualLabels, $predictedLabels) ;
    //     // // // Menampilkan metrik kinerja
        // return view('mining.isipengujian', compact( 'tes', 'accuracy', 'precision', 'recall', 'specificity', 'f1Score' ));
            // return view('mining.isipengujian', compact('tes', 'truePositive', 'trueNegative', 'falsePositive', 'falseNegative'));
        // }

    // private function accuracy($actual, $predicted)
    // {
    //     // Menghitung jumlah sampel
    //     $totalSamples = count($actual);

    //     // Inisialisasi jumlah prediksi yang benar
    //     $correctPredictions = 0;

    //     // Menghitung prediksi yang benar
    //     for ($i = 0; $i < $totalSamples; $i++) {
    //         if ($actual[$i] == $predicted[$i]) {
    //             $correctPredictions++;
    //         }
    //     }


    //     $accuracy = ($totalSamples > 0) ? ($correctPredictions / $totalSamples) * 100 : 0;

    //     // $accuracy = ($correctPredictions / $totalSamples) * 100;
        
    //     return $accuracy;
    // }

    // private function precision($actual, $predicted)
    // {
    //     // Implementasi perhitungan presisi
    //     $truePositives = $falsePositives = 0;

    //     for ($i = 0; $i < count($actual); $i++) {
    //         if ($actual[$i] == 1 && $predicted[$i] == 1) {
    //             $truePositives++;
    //         } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
    //             $falsePositives++;
    //         }
    //     }

    //     // Menghindari pembagian dengan nol
    //     $precision = ($truePositives + $falsePositives > 0) ? ($truePositives / ($truePositives + $falsePositives)) : 0;

    //     return $precision;
    // }

    // private function recall($actual, $predicted)
    // {
    //     // Implementasi perhitungan recall
    //     $truePositives = $falseNegatives = 0;

    //     for ($i = 0; $i < count($actual); $i++) {
    //         if ($actual[$i] == 1 && $predicted[$i] == 1) {
    //             $truePositives++;
    //         } elseif ($actual[$i] == 1 && $predicted[$i] == 0) {
    //             $falseNegatives++;
    //         }
    //     }

    //     // Menghindari pembagian dengan nol
    //     $recall = ($truePositives + $falseNegatives > 0) ? ($truePositives / ($truePositives + $falseNegatives)) : 0;

    //     return $recall;
    // }

    // private function specificity($actual, $predicted)
    // {
    //     // Implementasi perhitungan spesifisitas
    //     $trueNegatives = $falsePositives = 0;

    //     for ($i = 0; $i < count($actual); $i++) {
    //         if ($actual[$i] == 0 && $predicted[$i] == 0) {
    //             $trueNegatives++;
    //         } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
    //             $falsePositives++;
    //         }
    //     }

    //     // Menghindari pembagian dengan nol
    //     $specificity = ($trueNegatives + $falsePositives > 0) ? ($trueNegatives / ($trueNegatives + $falsePositives)) : 0;

    //     return $specificity;
    // }

    // private function f1Score($precision, $recall)
    // {
    //     // Implementasi perhitungan F1 Score

    //     // Menghindari pembagian dengan nol
    //     $f1Score = ($precision + $recall > 0) ? (2 * ($precision * $recall) / ($precision + $recall)) : 0;

    //     return $f1Score;
    // }



    // // Contoh data prediksi dan label yang sebenarnya
    //    $predicted = [0, 1, 1, 0, 1, 1];
    //    $actual = [0, 1, 0, 0, 1, 1];

     // Menghitung confusion matrix
    //    $confusionMatrix = ConfusionMatrix::compute($actual, $predicted);

    //     // Calculate the number of true positives, true negatives, false positives, and false negatives
    //     $tp = $confusionMatrix[1][1]; // True positives
    //     $tn = $confusionMatrix[0][0]; // True negatives
    //     $fp = $confusionMatrix[0][1]; // False positives
    //     $fn = $confusionMatrix[1][0]; // False negatives

    //     // Calculate accuracy
    //     $accuracy = ($tp + $tn) / (array_sum($confusionMatrix[0]) + array_sum($confusionMatrix[1]));

    //     // Calculate error rate
    //     $errorRate = 1 - $accuracy;

    //     // Calculate precision
    //     $precision = $tp / ($tp + $fp);

    //     // Calculate sensitivity (recall)
    //     $sensitivity = $tp / ($tp + $fn);


    //    // Menampilkan hasil metrik
    //    return response()->json([
    //        'confusion_matrix' => $confusionMatrix,
    //        'accuracy' => $accuracy,
    //        'error_rate' => $errorRate,
    //        'precision' => $precision,
    //        'sensitivity' => $sensitivity,
    //    ]);




    //     // Menghitung accuracy
    //     $accuracy = ($confusionMatrix[0][0] + $confusionMatrix[1][1]) / array_sum(array_map('array_sum', $confusionMatrix));

    //     // Menghitung error rate
    //     $errorRate = 1 - $accuracy;

    //     // Menghitung precision
    //     $precision = $confusionMatrix[1][1] / ($confusionMatrix[1][1] + $confusionMatrix[0][1]);

    //     // Menghitung sensitivity (recall)
    //     $sensitivity = $confusionMatrix[1][1] / ($confusionMatrix[1][1] + $confusionMatrix[1][0]);

    //    // Menampilkan hasil metrik
    //    return response()->json([
    //        'confusion_matrix' => $confusionMatrix,
    //        'accuracy' => $accuracy,
    //        'error_rate' => $errorRate,
    //        'precision' => $precision,
    //        'sensitivity' => $sensitivity,
    //    ]);





        // Menghitung accuracy
    //     $accuracy = 0;
    //     if (array_sum($confusionMatrix[0]) + array_sum($confusionMatrix[1]) > 0) {
    //         $accuracy = ($confusionMatrix[0][0] + $confusionMatrix[1][1]) / array_sum($confusionMatrix[0]) + array_sum($confusionMatrix[1]);
    //     }

    //     // Menghitung error rate
    //     $errorRate = 1 - $accuracy;

    //     // Menghitung precision
    //     $precision = 0;
    //     if ($confusionMatrix[0][1] + $confusionMatrix[1][1] > 0) {
    //         $precision = $confusionMatrix[1][1] / ($confusionMatrix[0][1] + $confusionMatrix[1][1]);
    //     }

    //     // Menghitung sensitivity (recall)
    //     $sensitivity = 0;
    //     if ($confusionMatrix[1][0] + $confusionMatrix[1][1] > 0) {
    //         $sensitivity = $confusionMatrix[1][1] / ($confusionMatrix[1][0] + $confusionMatrix[1][1]);
    //     }


    //    // Menampilkan hasil metrik
    //    return response()->json([
    //        'confusion_matrix' => $confusionMatrix,
    //        'accuracy' => $accuracy,
    //        'error_rate' => $errorRate,
    //        'precision' => $precision,
    //        'sensitivity' => $sensitivity,
    //    ]);
    // }
    



    // public function confusionMatrix()

    // {
    // // // Mendapatkan data dari tabel datasiswa berdasarkan nilai hasil mining
    // $tes = DB::table('data_testing')->get();
    // $predicted = [0, 1, 1, 0, 1, 1];
    //  $actual = [0, 1, 1, 0, 1, 0];

    // //  $actual = DataTesting::get('status_kelas')->toArray();
    // //  $predicted = DataTesting::get('hasil_mining')->toArray();

    // // // buat confusion matrix
    // $confusionMatrix = new ConfusionMatrix($actual, $predicted);

    // // tampilkan nilai confusion matrix
    // $truePositive = $confusionMatrix->truePositive();
    // $trueNegative = $confusionMatrix->trueNegative();
    // $falsePositive = $confusionMatrix->falsePositive();
    // $falseNegative = $confusionMatrix->falseNegative();

    // // hitung nilai akurasi, tingkat kesalahan, dan tingkat presisi
    // $accuracy = ($truePositive + $trueNegative) / count($actual);
    // $errorRate = ($falsePositive + $falseNegative) / count($actual);
    // $precision = $truePositive / ($truePositive + $falsePositive);
    // $sensitivity = $truePositive / ($truePositive + $falseNegative);

    // // hitung nilai lain seperti specificity, positive predictive value, dan negative predictive value
    // $specificity = $trueNegative / ($trueNegative + $falsePositive);
    // $positivePredictiveValue = $truePositive / ($truePositive + $falseNegative);
    // $negativePredictiveValue = $trueNegative / ($trueNegative + $falsePositive);

    // // kembalikan nilai-nilai ke view
    // return view('welcome', [
    //     'accuracy' => $accuracy,
    //     'errorRate' => $errorRate,
    //     'precision' => $precision,
    //     'sensitivity' => $sensitivity,
    //     'specificity' => $specificity,
    //     'positivePredictiveValue' => $positivePredictiveValue,
    //     'negativePredictiveValue' => $negativePredictiveValue,
    // ]);
    
    // }


























    // public function ujidata1()
    // {
        // Mendapatkan data aktual dan hasil prediksi dari model Anda
        // $transactions = DataTesting::all();
        // $actual = $transactions->pluck('status_kelas')->toArray();
        // $predicted = $transactions->pluck('hasil_mining')->toArray();


        // // Inisialisasi variabel untuk confusion matrix
        // $truePositive = $trueNegative = $falsePositive = $falseNegative = 0;

        // // Menghitung confusion matrix
        // for ($i = 0; $i < count($actual); $i++) {
        //     if ($actual[$i] == 1 && $predicted[$i] == 1) {
        //         $truePositive++;
        //     } elseif ($actual[$i] == 0 && $predicted[$i] == 0) {
        //         $trueNegative++;
        //     } elseif ($actual[$i] == 0 && $predicted[$i] == 1) {
        //         $falsePositive++;
        //     } elseif ($actual[$i] == 1 && $predicted[$i] == 0) {
        //         $falseNegative++;
        //     }
        // }
        // // Menyimpan nilai confusion matrix ke dalam array
        // // Menghitung metrik kinerja
        // $accuracy = $this->accuracy($actual, $predicted);
        // $precision = $this->precision($actual, $predicted);
        // $recall = $this->recall($actual, $predicted);
        // $specificity = $this->specificity($actual, $predicted);
        // $f1Score = $this->f1Score($precision, $recall);


        // Menampilkan confusion matrix
        // return view('mining.matrix', compact('transactions','truePositive', 'trueNegative', 'falsePositive', 'falseNegative', 'accuracy', 'precision', 'recall', 'specificity', 'f1Score'));
       
        // // Menghitung metrik kinerja
        // $accuracy = $this->accuracy($actualLabels, $predictedLabels);
        // $precision = $this->precision($actualLabels, $predictedLabels);
        // $recall = $this->recall($actualLabels, $predictedLabels);
        // $specificity = $this->specificity($actualLabels, $predictedLabels);
        // $f1Score = $this->f1Score($precision, $recall);
    
        // dd($accuracy);

        // Menampilkan metrik kinerja
        // return view('mining.isipengujian', compact('accuracy', 'precision', 'recall', 'specificity', 'f1Score'));
    
    // }




    
// }