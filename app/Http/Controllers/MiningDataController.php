<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'title' => 'Pengujian Perhitungan Data '
        ]
    );
    }
}
