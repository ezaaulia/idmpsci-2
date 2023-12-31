<?php

namespace App\Imports;

use App\Models\DataTesting;
use C45\C45;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataTest implements ToModel
{
    /**
     * Mengimpor dan memproses data siswa dari baris CSV.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Membuat instance model DataUji
        $datas = new DataTesting();
        $datas->nis = $row[0];
        $datas->nama = $row[1];
        $datas->asal = $row[2];
        $datas->nilai_tes_mtk = $row[3];
        $datas->nilai_tes_ipa = $row[4];
        $datas->nilai_tes_agama = $row[5];
        $datas->nilai_tes_bindo = $row[6];
        $datas->status_kelas = $row[7];

        // $datas = DataTesting::create([
        //     'nis' =>  $row['nis'],
        //     'nama' =>  $row['nama'],
        //     'asal' => $row['asal'],
        //     'nilai_tes_mtk' => $row['nilai_tes_mtk'],
        //     'nilai_tes_ipa' => $row['nilai_tes_ipa'],
        //     'nilai_tes_bindo' => $row['nilai_tes_bindo'],
        //     'nilai_tes_agama' => $row['nilai_tes_agama'],
        //     'status_kelas' =>$row['status_kelas']
        //     // 'hasil_mining' =>$row['hasil_mining']
        // ]);

        // Memuat model pohon keputusan C45
        $filename = public_path('/csv/Data_Training.csv');
        $c45 = new C45([
            'targetAttribute' => 'hasil_mining',
            'trainingFile' => $filename,
            'splitCriterion' => C45::SPLIT_GAIN,
        ]);
        $tree = $c45->buildTree();
        // $treeString = $tree->toString();

        // Data yang akan diklasifikasikan
        $data = [
            'nilai_tes_mtk' => strtoupper($datas->nilai_tes_mtk),
            'nilai_tes_ipa' => strtoupper($datas->nilai_tes_ipa),
            'nilai_tes_agama' => strtoupper($datas->nilai_tes_agama),
            'nilai_tes_bindo' => strtoupper($datas->nilai_tes_bindo),
        ];

        // Melakukan klasifikasi menggunakan pohon keputusan C45
        $hasil = $tree->classify($data);

        // Menyimpan status kelas hasil klasifikasi
        $datas->hasil_mining = $hasil;
        $datas->save();
    }
}
    


