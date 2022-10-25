<?php

namespace App\Imports;

use App\Models\DataSiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSiswa([
            'nis' => $row[1],
            'nama' => $row[2],
            'asal' => $row[3],
            // 'nilai_tot' => $row[1],
            'nilai_tes_mtk' => $row[4],
            'nilai_tes_ipa' => $row[5],
            'nilai_tes_bi' => $row[6],
            'nilai_tes_agama' => $row[7],
            'status_kelas' => $row[8],
        ]);
    }
}
