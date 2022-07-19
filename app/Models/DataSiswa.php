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
        'nis', 
        'nama', 
        'status_kelas',
        
    ];

    // public function allData()
    // {
    //     return DB::table('data_siswas')->get();
    // }

    public function nilai_tes()
    {
        return $this->hasOne(NilaiTes::class, 'data_siswas_nis', 'nis');
        
    }

    //ini untuk detail persiswa
    public function detailsis($nis)
    {
        return DB::table('data_siswas')->where('nis', $nis)->first();
    }

}
