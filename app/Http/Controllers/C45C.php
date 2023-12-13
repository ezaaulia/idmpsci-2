<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;

class C45 extends Controller
{
    public function loadFile($filePath)
    {
        try {
            // Membaca file CSV
            $csv = Reader::createFromPath(public_path("/import_csv/$filePath"), 'r');
            $csv->setHeaderOffset(0); // Baris pertama sebagai header

            // Mendapatkan data dari CSV
            $records = $csv->getRecords();

            // Proses data sesuai kebutuhan
            $data = [];
            foreach ($records as $record) {
                $data[] = [
                    'nis' => $record['nis'],
                    'nama' => $record['nama'],
                    'asal' => $record['asal'],
                    'nilai_tes_mtk' => $record['nilai_tes_mtk'],
                    'nilai_tes_ipa' => $record['nilai_tes_ipa'],
                    'nilai_tes_agama' => $record['nilai_tes_agama'],
                    'nilai_tes_bindo' => $record['nilai_tes_bindo'],
                    'status_kelas' => $record['status_kelas'],
                ];
            }

            // Response atau redirect setelah pemrosesan
            return response()->json(['message' => 'File CSV berhasil diproses']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika ada
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

