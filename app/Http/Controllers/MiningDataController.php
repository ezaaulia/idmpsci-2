<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HasilTraining;
use Algorithm\C45;
use Algorithm\C45\DataInput;

class MiningDataController extends Controller
{

    public function mining()
    {
        $data = DB::table('data_siswas')
                    ->join('nilai_tes', 'nilai_tes.id', '=', 'data_siswas.id')
                    ->get();

        return view('mining.hasilmining', compact('data'));
    }
 
}
