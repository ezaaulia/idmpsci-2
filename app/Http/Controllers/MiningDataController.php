<?php

namespace App\Http\Controllers;

// use C45\C45;
use App\Http\Controllers\C45;
use App\Models\NilaiTes;
use App\Models\DataSiswa;
use App\Models\DataTraining;
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

    // apakah akan bermain atau tidak,berdasarkan kondisi cuaca (suhu, kelembaban, angin).

    // panggil fungsi index biar tau hasilnya
    // hasil: {"attribute":"suhu", "children":{"panas":"tidak","kelembaban":"tidak","dingin":"ya"}}
    public function prosesmining(Request $request)
    {
        // Ambil data training
        $data = DB::table('data_siswas')
                     ->join('nilai_tes', 'nilai_tes.data_siswas_id', '=', 'data_siswas.id')
                     ->get();

        // Membuat pohon keputusan
        // $tree = $this->createTree($data);

        // Cth :kembalikan pohon keputusan dengan data tipe json
        // return response()->json($tree);
        // Cth mau nampilin di balde.
        return view('mining.isimining_data', [
            // 'tree' => $tree,
            'data' => $data,
            'title' => 'Mining Data'
        ]);
    
    }

    // private function entropy(array $values)
	// {
	// 	$result = 0;
	// 	$sum = array_sum($values);

	// 	foreach ($values as $value) 
	// 	{
	// 		if ($value > 0) 
	// 		{
	// 			$proportion = $value / $sum;
	// 			$result += -($proportion * log($proportion, 2));
	// 		}
	// 	}

	// 	return $result;
    // }
    private function createTree($data)
    {
        // Periksa apakah data sudah menjadi leaf node

        $labels = array_column($data, 'data_siswas');
        if (count(array_unique($labels)) === 1) {
            return array_unique($labels)[0];
        }

        // Hitung entropi dasar
        $baseEntropy = $this->calculateEntropy($data);

        // Pilih atribut terbaik untuk root

        $bestAttribute = $this->selectBestAttribute($data, $baseEntropy);

        // Membuat pohon keputusan
        $tree = [
            'attribute' => $bestAttribute,
            'children' => []
        ];

        // Pisahkan data berdasarkan atribut terbaik
        $splittedData = $this->splitData($data, $bestAttribute);

        // Buat pohon secara rekursif untuk setiap pemisahan
        foreach ($splittedData as $value => $dataSplit) {
            $tree['children'][$value] = $this->createTree($dataSplit);
        }

        return $tree;
    }

    private function calculateEntropy($data)
    {
        // Hitung total instance
        $total = count($data);

        // Hitung instance dari setiap label
        $labelCounts = [];
        foreach ($data as $instance) {
            $label = $instance['status_kelas'];
            if (!isset($labelCounts[$label])) {
                $labelCounts[$label] = 0;
            }
            $labelCounts[$label]++;
        }
        // Hitung entropi
        $entropy = 0;
        foreach ($labelCounts as $count) {
            $probability = $count / $total;
            $entropy -= $probability * log($probability, 2);
        }

        return $entropy;
    }

    private function selectBestAttribute($data, $baseEntropy)
    {
        // Hitung perolehan informasi untuk setiap atribut
        $bestAttribute = null;
        $bestGain = 0;
        foreach ($data[0] as $attribute => $value) {
            if ($attribute != 'status_kelas') {
                $gain = $this->calculateInformationGain($data, $attribute, $baseEntropy);
                if ($gain > $bestGain) {
                    $bestGain = $gain;
                    $bestAttribute = $attribute;
                }
            }
        }
        return $bestAttribute;
    }

    private function calculateInformationGain($data, $attribute, $baseEntropy)
    {
        $gain = $baseEntropy;
        $values = array_column($data, $attribute);
        $values = array_unique($values);
        foreach ($values as $value) {
            if (is_null($value) || empty($value)) {
                continue;
            }
            $subset = array_filter($data, function ($item) use ($attribute, $value) {
                return $item[$attribute] == $value;
            });
            $probability = count($subset) / count($data);
            $entropy = $this->calculateEntropy($subset);
            $gain -= $probability * $entropy;
        }
        return $gain;
    }

    private function splitData($data, $attribute)
    {
        $splittedData = [];
        foreach ($data as $instance) {
            $value = $instance[$attribute];
            if (!isset($splittedData[$value])) {
                $splittedData[$value] = [];
            }
            $splittedData[$value][] = $instance;
        }
        return $splittedData;
    }


}
