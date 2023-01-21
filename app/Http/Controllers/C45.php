<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class C45 extends Controller
{
    // contoh keputusan
    // apakah akan bermain atau tidak,berdasarkan kondisi cuaca (suhu, kelembaban, angin).

    // panggil fungsi index biar tau hasilnya
    // hasil: {"attribute":"suhu", "children":{"panas":"tidak","kelembaban":"tidak","dingin":"ya"}}
    public function index(Request $request)
    {
        // Ambil data training
        $data = $this->loadData();

        // Membuat pohon keputusan
        $tree = $this->createTree($data);

        // Cth :kembalikan pohon keputusan dengan data tipe json
        return response()->json($tree);
        // Cth mau nampilin di balde.
        // return view('index', [
		// 	'tree' => $tree,
		// 	'title' => 'Mining Data']);
        /**
         *
         * <ul>
         *     <li>Attribute: {{ $tree['attribute'] }}</li>
         *         <ul>
         *             @foreach($tree['children'] as $value => $child)
         *             <li>value: {{ $value }}</li>
         *             <ul>
         *                 {{-- menampilkan node child secara rekursif --}}
         *             </ul>
         *             @endforeach
         *        </ul>
         * </ul>
         */
    }

    private function loadData()
    {
        return [
            ['nama' => 'eza','mtk' => 'A', 'ipa' => 'B', 'agama' => 'C', 'bindo' => 'D', 'kelas' => 'ci', 'ketepatan' => 'tidak'],
			['nama' => 'aulia','mtk' => 'A', 'ipa' => 'B', 'agama' => 'C', 'bindo' => 'D', 'kelas' => 'reguler', 'ketepatan' => 'benar'],
			['nama' => 'lia','mtk' => 'A', 'ipa' => 'B', 'agama' => 'C', 'bindo' => 'D', 'kelas' => 'reguler', 'ketepatan' => 'salah'],
			['nama' => 'za','mtk' => 'A', 'ipa' => 'B', 'agama' => 'C', 'bindo' => 'D', 'kelas' => 'ci', 'ketepatan' => 'salah'],
            // ['suhu' => 'panas', 'kelembaban' => 'tinggi', 'angin' => 'lemah', 'play' => 'tidak'],
            // ['suhu' => 'ringan', 'kelembaban' => 'tinggi', 'angin' => 'kuat', 'play' => 'tidak'],
            // ['suhu' => 'dingin', 'kelembaban' => 'normal', 'angin' => 'kuat', 'play' => 'ya'],
            // ['suhu' => 'dingin', 'kelembaban' => 'normal', 'angin' => 'lemah', 'play' => 'ya'],
        ];
    }

    private function createTree($data)
    {
        // Periksa apakah data sudah menjadi leaf node

        $labels = array_column($data, 'ketepatan');
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
            $label = $instance['ketepatan'];
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
            if ($attribute != 'ketepatan') {
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