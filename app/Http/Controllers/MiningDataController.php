<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Algorithm\C45;
use Algorithm\C45\DataInput;

class MiningDataController extends Controller
{
    public function ujidata()
    {   
        $datas = DB::table('data_siswas')
                    ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
                    ->get();

        return view('mining.isipengujian',
        [   
            'datas' => $datas,
            'title' => 'Pengujian Perhitungan Data'
        ]
    );
    
    }

    // public function isimd()
    // {
	// 	$datas = DB::table('data_siswas')
    //                 ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
    //                 ->get();

    //     return view('mining.isimining_data',
    //     [   'datas' => $datas,
    //         'title' => 'Mining Data'
    //     ]);
    // }

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
        // $data = Student::all();
        $data = DB::table('data_siswas')
                     ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
                     ->get();

        $input = new DataInput();
        $input->setAttributes(array('nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo')); // Set attributes of data

        $target = 'status_kelas';
        $input->setData($data); // Set data from array
        $c45->c45 = $input; // Set input data

        $c45 = new C45();
        dd($c45);
        $tree = $c45->run();

        //AKURASI
        $before = $data->count();
        $after = 0;
        foreach ($data as $student) {
            $result = $c45->classify($student);
            if ($result == $student->status_kelas) {
                $after++;
            }
        }
        $accuracy = $after / $before * 100;

        
        return view('mining.isResults', compact('tree', 'accuracy', 'before', 'after'));
    }
}
