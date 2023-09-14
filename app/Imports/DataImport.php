<?php

namespace App\Imports;

use App\Models\DataSiswa;
use App\Models\NilaiTes;
use C45\C45;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToCollection, WithHeadingRow
{

    /**
     * Mengimpor dan memproses data siswa dari baris CSV.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    
    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
            $data_siswa = DataSiswa::create([
               'nis' =>  $row['nis'],
               'nama' =>  $row['nama'],
               'asal' => $row['asal'],
           ]);

            $data_siswa->nilai_tes()->create([
                'nilai_tes_mtk' => $row['nilai_tes_mtk'],
                'nilai_tes_ipa' => $row['nilai_tes_ipa'],
                'nilai_tes_bindo' => $row['nilai_tes_bindo'],
                'nilai_tes_agama' => $row['nilai_tes_agama'],
                'status_kelas' =>$row['status_kelas']
            ]);
          
            
            // // Memuat model pohon keputusan C45
            // $filename = public_path('/csv/Data_Training.csv');
            // $c45 = new C45([
            //     'targetAttribute' => 'status_kelas',
            //     'trainingFile' => $filename,
            //     'splitCriterion' => C45::SPLIT_GAIN,
            // ]);
            // $tree = $c45->buildTree();
            // $treeString = $tree->toString();

            // // Data yang akan diklasifikasikan
            // $data = [
            //     'nilai_tes_mtk' => strtoupper($data_siswa->nilai_tes_mtk),
            //     'nilai_tes_ipa' => strtoupper($data_siswa->nilai_tes_ipa),
            //     'nilai_tes_agama' => strtoupper($data_siswa->nilai_tes_agama),
            //     'nilai_tes_bindo' => strtoupper($data_siswa->nilai_tes_bindo),
            // ];

            // // Melakukan klasifikasi menggunakan pohon keputusan C45
            // $hasil = $tree->classify($data);

            // // Menyimpan status kelas hasil klasifikasi
            // $data_siswa->status_kelas = $hasil;
            // $data_siswa->save();
      }
    }
}
