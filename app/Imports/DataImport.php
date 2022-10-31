<?php

namespace App\Imports;

use App\Models\NilaiTes;
use App\Models\DataSiswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToCollection, WithHeadingRow
{
    
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
          
      }
    }
}
