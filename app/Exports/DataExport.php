<?php

namespace App\Exports;

use App\Models\DataSiswa;
use App\Models\NilaiTes;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DataExport implements 
    FromCollection, 
    WithMapping, 
    WithHeadings,
    WithEvents

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataSiswa::with('nilai_tes')->get();
    }

    public function map($data_siswa) : array
    {
        return [
            $data_siswa->nis,
            $data_siswa->nama,
            $data_siswa->asal,
            $data_siswa->nilai_tes->nilai_tes_mtk,
            $data_siswa->nilai_tes->nilai_tes_ipa,
            $data_siswa->nilai_tes->nilai_tes_agama,
            $data_siswa->nilai_tes->nilai_tes_bindo,
            $data_siswa->nilai_tes->status_kelas,
        ];
    }

    public function headings(): array
    {
        
        return [
           'NIS',
           'Nama Siswa',
           'Asal Sekolah',
           'Nilai Tes MTK',
           'Nilai Tes IPA',
           'Nilai Tes Agama',
           'Nilai Tes B.Indo',
           'Kelas'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $events) {
                $events->sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
