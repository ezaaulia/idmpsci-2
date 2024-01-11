<?php

namespace App\Imports;

use App\Models\DataLatih;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataTraining implements ToModel, WithHeadingRow
{
    /**
     * Mengimpor dan memproses data siswa dari baris CSV.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $datas = DataLatih::create([
            'nilai_tes_mtk' => $row['nilai_tes_mtk'],
            'nilai_tes_ipa' => $row['nilai_tes_ipa'],
            'nilai_tes_agama' => $row['nilai_tes_agama'],
            'nilai_tes_bindo' => $row['nilai_tes_bindo'],
            'hasil_mining' =>$row['hasil_mining'],
        ]);

        $datas->save();
    }
}
    


