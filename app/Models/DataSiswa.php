<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiTes;
use Illuminate\Http\SiswaController;
use Ramsey\Uuid\Rfc4122\NilUuid;

class DataSiswa extends Model
{
    use HasFactory;

    //cobacreateinsertlara4
    // public function insertSis($inserts)
    // {
    //      DB::table('data_siswas')->insert($inserts);
    // }

    protected $table = 'data_siswas';

    protected $fillable = [
        'id',
        'nis', 
        'nama', 
        'asal',
        
    ];

    public function allData()
    {
        return DB::table('data_siswas')->get();
    }

    public function nilai_tes()
    {
        return $this->hasOne(NilaiTes::class, 'data_siswas_id', 'id');
        
    }

    // ini untuk detail persiswa
    public function detailSis($id)
    {
        return DB::table('data_siswas')->where('id', $id)->first();
    }
    
    //ini untuk nambah data siswa 
    // public function addData($datasis)
    // {
    //     DB::table('data_siswas')->insert($datasis);
    // }

    //ini untuk edit data siswa
    // public function editData($id, $datasis)
    // {
    //     DB::table('data_siswas')
    //         ->where('id', $id)
    //         ->update($datasis);
    // }

    //ini untuk hapus data siswa
    // public function deleteData($id)
    // {
    //     DB::table('data_siswas')
    //         ->where('id', $id)
    //         ->delete();
    // }

}
