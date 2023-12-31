<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\DataSiswa;
use App\Imports\DataTest;
use App\Models\DataTesting;
use Algorithm\C45;
use Algorithm\C45\DataInput;
// use App\C45;
// use C45\C45;


class MiningDataController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function pohon(Request $request) 
    {

        $c45 = new C45();
        $c45->loadFile('csv/Data_Training.csv'); // load example file
        $c45->setTargetAttribute('hasil_mining'); // set target attribute

        $initialize = $c45->initialize(); // initialize
        $buildTree = $initialize->buildTree(); // build tree

        // $arrayTree = $buildTree->toArray(); // set to array
        $stringTree = $buildTree->toString(); // set to string
            
        return view('mining.pohonkeputusan', compact('stringTree'));
    }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function hasil()
    // {
    //     $status = DataTesting::all();

    //     return view('mining.hasilmining', compact('status'));

    // }


}