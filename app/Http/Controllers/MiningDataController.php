<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Algorithm\C45;
use Algorithm\C45\DataInput;

class MiningDataController extends Controller
{

    public function prosesmining()
    {
        $data = DB::table('data_siswas')
                    ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
                    ->get();
        // $data = Student::all();

        // $c45 = new C45();

        // dd($c45);
        return view('mining.isimining_data', compact('data'));
    }

    public function process()
    {
        $c45 = new C45();
        $input = new DataInput;
        // $data = [
        //     ['nama' => 'Siswa 1', 'nilai_mtk' => 80, 'nilai_ipa' => 90, 'nilai_bi' => 85, 'nilai_agama' => 78, 'status_lulus' => 'lulus'],
        //     ['nama' => 'Siswa 2', 'nilai_mtk' => 75, 'nilai_ipa' => 89, 'nilai_bi' => 80, 'nilai_agama' => 82, 'status_lulus' => 'lulus'],
        //     ['nama' => 'Siswa 3', 'nilai_mtk' => 70, 'nilai_ipa' => 78, 'nilai_bi' => 75, 'nilai_agama' => 70, 'status_lulus' => 'tidak lulus'],
        // ];
        $data = DB::table('data_siswas')
                     ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
                     ->get();
        $input->setData($data); // Set data from array
        $input->setAttributes(array('nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo', 'status_kelas')); // Set attributes of data


        
        // $data = Student::all();

    //     $input = new DataInput();
        // $input->setData($data); // Set data from array
        // $input->setAttributes(array('nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo')); // Set attributes of data

    //     $target = 'status_kelas';
    //     $c45->c45 = $input; // Set input data

    //     $c45 = new C45();
    //     dd($c45);
    //     $tree = $c45->run();

    //     //AKURASI
    //     $before = $data->count();
    //     $after = 0;
    //     foreach ($data as $student) {
    //         $result = $c45->classify($student);
    //         if ($result == $student->status_kelas) {
    //             $after++;
    //         }
    //     }
    //     $accuracy = $after / $before * 100;

    $c45->c45 = $input; // Set input data
    $c45->setTargetAttribute('status_kelas'); // Set target attribute
    $initialize = $c45->initialize(); // initialize

    $buildTree = $initialize->buildTree(); // Build tree
    $arrayTree = $buildTree->toArray(); // Set to array
    $stringTree = $buildTree->toString(); // Set to string

    dd($input);
    //     return view('mining.isResults', compact('tree', 'accuracy', 'before', 'after'));
    }
}
