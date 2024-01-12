<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\DataTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use File;

class ImportLatih extends Controller
{
    /**
     * Mengimpor data siswa dari file CSV.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        // Validasi apakah file telah disertakan
        $this->validate($request, [
            'file' => 'required',
        ]);

        // Ambil file yang diunggah oleh pengguna
        $newDataFile = $request->file('file');


         // Set the static filename for the uploaded file
        $fileName = 'Data_Training.csv';
        
        // Path tempat menyimpan file yang diunggah
        $filePath = 'csv/' . $fileName;

        // Cek apakah file dengan nama yang sama sudah ada
        if (Storage::exists($filePath)) {
            // Hapus file yang sudah ada sebelum menyimpan yang baru
            Storage::delete($filePath);
        }

        // Simpan file yang diunggah dengan nama yang telah ditetapkan
        $newDataFile->storeAs('csv', $fileName);

        // Hapus data lama dari database sebelum menambahkan data baru
        DB::table('data_latih')->truncate();

        Excel::import(new DataTraining, storage_path('app/csv/' . $fileName), null, \Maatwebsite\Excel\Excel::CSV);

        // Beri pesan sukses atau redirect ke halaman lain
        return redirect()->route('datalatih')->with('success', 'File data baru berhasil diunggah dan data siswa berhasil diimpor.');

    }



}
