<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ImportData extends Controller
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

        // Mengambil file yang diunggah
        $file = $request->file('file');

        // Menghasilkan nama unik untuk file dan memindahkannya ke direktori 'import_csv'
        $filename = rand() . $file->getClientOriginalName();
        $file->move('import_csv', $filename);

        // Mengimpor data siswa dari file CSV menggunakan library Excel
        Excel::import(new DataImport, public_path('/import_csv/' . $filename), null, \Maatwebsite\Excel\Excel::CSV);

        // Menampilkan pesan sukses dan mengarahkan kembali ke halaman daftar siswa
        Session::flash('sukses', 'Data berhasil diupload');
        return redirect()->route('lihatsiswa');
    }
}
