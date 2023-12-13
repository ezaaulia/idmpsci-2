<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use Algorithm\C45;
use Algorithm\C45\DataInput;
use Algorithm;
use Illuminate\Support\Facades\DB;


class MiningSiswaController extends Controller
{

    // public function mining()
    // {
    //     $status = DataSiswa::all();
    //     // $data = Student::all();

    //     // $c45 = new C45();

    //     // dd($c45);
    //     return view('mining.hasil_mining', compact('status'));
    // }

    public function index(Request $request)
    {
        $c45 = new C45();
        $input = new DataInput();

        // Initialize Data
        $input->setData($this->ambilData()); // Set data from array

        $input->setAttributes(array('nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo', 'status_kelas')); // Set attributes of data

        // Initialize C4.5
        $c45->c45 = $input; // Set input data
        // $c45->setTargetAttribute('hasil_mining'); // Set target attribute
        $initialize = $c45->initialize(); // initialize

        // Build Output
        $buildTree = $initialize->buildTree(); // Build tree
        $arrayTree = $buildTree->toArray(); // Set to array
        $stringTree = $buildTree->toString(); // Set to string

        // echo "<pre>";
        // print_r($arrayTree);
        // echo "</pre>";
        // echo "<hr>";
        // echo $stringTree;
        // echo "<hr>";

        // $data_testing = array(
        //     'nilai_tes_mtk' => $this->konversiKategori(85),
        //     'nilai_tes_ipa' => $this->konversiKategori(92),
        //     'nilai_tes_agama' => $this->konversiKategori(88),
        //     'nilai_tes_bindo' => $this->konversiKategori(99)
        // );

        return view('mining', compact('arrayTree', 'stringTree'));
        // echo $c45->initialize()->buildTree()->classify($data_testing); // print "No"
    }

    public function ambilData()
    {
        $data = DataSiswa::all();
        return $data;
    }

    // public function konversiKategori($nilai)
    // {

    //     if ($nilai >= 50 && $nilai < 60) {
    //         return 'D';
    //     } else if ($nilai >= 60 && $nilai < 70) {
    //         return 'C';
    //     } elseif ($nilai >= 70 && $nilai < 80) {
    //         return 'B';
    //     } elseif ($nilai >= 80 && $nilai < 90) {
    //         return 'A';
    //     } elseif ($nilai >= 90 && $nilai < 100) {
    //         return 'A+';
    //     } else {
    //         return 'E';
    //     }
    // }

    // public function proses()
    // {

    //     $c45 = new Algorithm\C45();
    //     $input = new Algorithm\C45\DataInput;
        
    //     // Initialize Data
    //     $input->setData($this->ambilData()); // Set data from array
    //     $input->setAttributes(array('nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo', 'status_kelas')); // Set attributes of data

    //     // Initialize C4.5
    //     $c45->c45 = $input; // Set input data
    //     $c45->setTargetAttribute('status_kelas'); // Set target attribute
    //     $initialize = $c45->initialize(); // initialize

    //     // Build Output
    //     $buildTree = $initialize->buildTree(); // Build tree
    //     $arrayTree = $buildTree->toArray(); // Set to array
    //     $stringTree = $buildTree->toString(); // Set to string

    //     echo "<pre>";
    //     print_r($arrayTree);
    //     echo "</pre>";

    //     // ini menampilkan hasil dibawah pohon
    //     echo "<hr>";
    //     echo $stringTree;
    //     echo "<hr>";

    //     $data_testing = array(
    //         'nilai_tes_mtk' => $this->konversiKategori(86),
    //         'nilai_tes_ipa' => $this->konversiKategori(84),
    //         'nilai_tes_agama' => $this->konversiKategori(84),
    //         'nilai_tes_bindo' => $this->konversiKategori(90)
    //     );

    //     echo $c45->initialize()->buildTree()->classify($data_testing); // print "No"
    // }

    // public function ambilData()
    // {
    //     $data_training = [];
    //     $data = DataSiswa::get();
    //     foreach ($data as $dt) {
    //         $item = [
    //             'nilai_tes_mtk' => $this->konversiKategori($dt->nilai_tes_mtk),
    //             'nilai_tes_ipa' => $this->konversiKategori($dt->nilai_tes_ipa),
    //             'nilai_tes_agama' => $this->konversiKategori($dt->nilai_tes_agama),
    //             'nilai_tes_bindo' => $this->konversiKategori($dt->nilai_tes_bindo),
    //             'status_kelas' => $dt->status_kelas,

    //         ];
    //         array_push($data_training, $item);
    //     }
    //     return $data_training;
    // }

    // public function konversiKategori($nilai)
    // {

    //     if ($nilai >= 50 && $nilai < 60) {
    //         return 'D';
    //     } else if ($nilai >= 60 && $nilai < 70) {
    //         return 'C';
    //     } elseif ($nilai >= 70 && $nilai < 80) {
    //         return 'B';
    //     } elseif ($nilai >= 80 && $nilai < 90) {
    //         return 'A';
    //     } elseif ($nilai >= 90 && $nilai < 100) {
    //         return 'A+';
    //     } else {
    //         return 'E';
    //     }
    // }
}
