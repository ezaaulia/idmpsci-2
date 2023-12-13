<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use App\Imports\DataTest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Algorithm\C45\DataInput;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Algorithm\C45;
use App\Models\DataTesting;
// use App\C45;
// use C45\C45;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as PhpSpreadsheetReaderException;
use PhpOffice\PhpSpreadsheet\Reader\Csv as PhpSpreadsheetReaderCsv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as PhpSpreadsheetReaderXlsx;

class MiningDataController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = DataSiswa::all();
        return view('mining.hasilmining', compact('status'));

    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ujidata(Request $request)
    {
        $tes = DataTesting::all();
        return view('mining.isipengujian', compact('tes'));

    }

    public function upload(Request $request)
    {
        
        Excel::import(new DataTest(), $request->file(key:'import_file'));

        return redirect('pengujiandata')->with('pesan', 'Data Testing Berhasil di Upload!!!');
    }

    public function pohon(Request $request) 
    // try
    {
        // $c45 = new C45();
        // // $c45 = new Algorithm\C45();
        // $c45->loadFile('Data_Training.xlsx')->setTargetAttribute('status_kelas')->initialize();

        // echo "<pre>";
        // print_r ($c45->buildTree()->toString()); // print as string
        // echo "</pre>";

        // echo "<pre>";
        // print_r ($c45->buildTree()->toJson()); // print as JSON
        // echo "</pre>";

        // echo "<pre>";
        // print_r ($c45->buildTree()->toArray()); // print as array
        // echo "</pre>";

        // $file = new Csv();
        // $spreadsheet = $file->load('/import_csv/Data_Training.csv');

        $c45 = new C45();
        // $c45 = new Algorithm\C45();

        // $c45 = new Csv();
        // $spreadsheet = $c45->load('public/import_csv/Data_Training.csv');

        // $filePath = 'public/import_csv/Data_Training.csv';
        // if (file_exists($filePath)) {
        //     $c45->loadFile($filePath);
        // } else {
        //     die("Error: The file '$filePath' does not exist.");
        // }

        // $reader = new PhpSpreadsheetReaderCsv();
        // $spreadsheet = $reader->load('/import_csv/Data_Training.csv');

        $c45->loadFile('Data_Training.csv'); // load example file
        $c45->setTargetAttribute('hasil_mining'); // set target attribute
        
        $initialize = $c45->initialize(); // initialize
        $buildTree = $initialize->buildTree(); // build tree
        

        $arrayTree = $buildTree->toArray(); // set to array
        $stringTree = $buildTree->toString(); // set to string


        echo "<pre>";
        print_r ($arrayTree);
        echo "</pre>";

        echo $stringTree;
    // } catch (PhpSpreadsheetReaderException $e) {
    //     echo 'Error loading file: ' . $e->getMessage();
    // }


            // $c45 = new C45('Data_Training.csv', 'hasil_mining');
            // // $c45 = new Algorithm\C45('example.xlsx', 'PLAY');
            // $initialize = $c45->initialize(); // initialize
            // $buildTree = $initialize->buildTree(); // build tree

            // $arrayTree = $buildTree->toArray(); // set to array
            // $stringTree = $buildTree->toString(); // set to string

            // echo "<pre>";
            // print_r ($arrayTree);
            // echo "</pre>";

            // echo $stringTree;

        // return view('mining.hasilmining', compact('arrayTree', 'stringTree'));
        // return redirect()->route('lihatsiswa')->with('pesan', 'Data Siswa Berhasil di Tambahkan!!!');
    }



    // public function isimining_data()
    // {
    //     // Memuat model pohon keputusan C45
    //     $filename = public_path('/import_csv/Data_Training.csv');
    //     $c45 = new C45([
    //         'targetAttribute' => 'hasil_mining',
    //         'trainingFile' => $filename,
    //         'splitCriterion' => C45::SPLIT_GAIN,
    //     ]);

    //     $tree = $c45->buildTree();
    //     // $treeString = $tree->toString();
    //     $treeData = $this->convertTreeToJsTreeFormat($tree);
    //     // return view('mining.isimining_data', [
    //     //     'treeString' => $treeString,
    //     // ]);
    //     // Render view dengan melewatkan data pohon keputusan
    //     return view('decision-tree.show', compact('treeData'));
    // }

}