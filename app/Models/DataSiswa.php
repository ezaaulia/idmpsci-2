<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\SiswaController;
use Ramsey\Uuid\Rfc4122\NilUuid;

class DataSiswa extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('data_siswas')->get();
    }

    public function NilaiTes()
    {
        return $this->hasOne(NilaiTes::class);
        
    }

    // ini untuk detail persiswa
    // public function lihatsiswa($id)
    // {
    //     return DB::table('data_siswas')->where('id', $id)->first();

    // }

    //cobacreateinsertlara4
    public function insertSis($inserts)
    {
         DB::table('data_siswas')->insert($inserts);
    }

    protected $guarded = [
        'nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo',
        
    ];
}
