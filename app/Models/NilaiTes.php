<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NilaiTes extends Model
{
    use HasFactory;
    
    // public function insertNil($insertn)
    // {
    //      DB::table('nilai_tes')->insert($insertn);
    // }

    protected $fillable = [
        'nilai_tes_mtk', 'nilai_tes_ipa', 'nilai_tes_agama', 'nilai_tes_bindo',
    ];

    public function allData()
    {
        return DB::table('nilai_tes')->get();
    }

    public function DataSiswa()
    {
        return $this->belongsTo(DataSiswa::class);
    }


    // public function lihatnilai($users_id)
    // {
    //     return DB::table('nilai_tes')->where('users_id', $users_id)->first();

    // }
}
