<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataLatih;
use Algorithm\C45;


class MiningDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function datalatih(Request $request)
    {
        $latih = DataLatih::all();

        return view('mining.datalatih',
        [   
            'latih' => $latih,
        ]);
    }

    /**
     * Menghasilkan file PDF dari daftar status siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadtemplate()
    {

        // Path ke file CSV template yang ingin diunduh
        $filePath = storage_path('app/files/template-file-latih.csv');

        // Mengembalikan respons untuk mengunduh file
        return response()->download($filePath);

    }

    public function pohon(Request $request) 
    {
        $filePath = storage_path('app/csv/Data_Training.csv');

        if (!file_exists($filePath)) {
            // Jika file tidak ditemukan, beri tahu pengguna
            return view('mining.pohonkeputusan', ['stringTree' => null, 'error']);
        }

        $c45 = new C45();

        $c45->loadFile($filePath); // load example file
        $c45->setTargetAttribute('hasil_mining'); // set target attribute

        $initialize = $c45->initialize(); // initialize
        $buildTree = $initialize->buildTree(); // build tree

        $stringTree = $buildTree->toString(); // set to string
            
        return view('mining.pohonkeputusan', compact('stringTree'));
    }



}