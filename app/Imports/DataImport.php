<?php

namespace App\Imports;

use App\Models\DataSiswa;
use C45\C45;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel, WithHeadingRow
{
    /**
     * Mengimpor dan memproses data siswa dari baris CSV.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    
    public function model(array $row)
    {
        // Membuat instance model DataSiswa
        // $data_siswa = new DataSiswa();
        // $data_siswa->nis = $row[0];
        // $data_siswa->nama = $row[1];
        // $data_siswa->asal = $row[2];
        // $data_siswa->nilai_tes_mtk = $row[3];
        // $data_siswa->nilai_tes_ipa = $row[4];
        // $data_siswa->nilai_tes_agama = $row[5];
        // $data_siswa->nilai_tes_bindo = $row[6];
        // $data_siswa->status_kelas = $row[7];

        $data_siswa = DataSiswa::create([
            'nis' =>  $row['nis'],
            'nama' =>  $row['nama'],
            'asal' => $row['asal'],
            'nilai_tes_mtk' => $row['nilai_tes_mtk'],
            'nilai_tes_ipa' => $row['nilai_tes_ipa'],
            'nilai_tes_bindo' => $row['nilai_tes_bindo'],
            'nilai_tes_agama' => $row['nilai_tes_agama'],
            'status_kelas' =>$row['status_kelas']
        ]);

        // Memuat model pohon keputusan C45
        // $filename = public_path('csv/Data_Siswa.csv');
        // $c45 = new C45([
        //     'targetAttribute' => 'status_kelas',
        //     'trainingFile' => $filename,
        //     'splitCriterion' => C45::SPLIT_GAIN,
        // ]);
        // $tree = $c45->buildTree();
        // // $treeString = $tree->toString();

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
        $data_siswa->save();

      
    }
    
}
