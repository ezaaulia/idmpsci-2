<?php

namespace App\Models;

use App\Imports\DataTest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiTes;
use App\Models\DataSiswa;

class HasilTraining extends Model
{
    use HasFactory;

    protected $table = 'hasil_trainings';

    protected $fillable = [
        'id',
        // 'data_siswas_id',
        'data_testing_id',
        // 'nis', 
        // 'nama', 
        // 'asal',
        // 'nilai_tes_mtk', 
        // 'nilai_tes_ipa', 
        // 'nilai_tes_agama', 
        // 'nilai_tes_bindo',
        'status_kelas',
        'hasil_mining',
        
    ];

    public function allData()
    {
        return DB::table('hasil_trainings')->get();
    }

    public function data_testing()
    {
        return $this->hasOne(DataTest::class, 'data_testing_id');
    }
}
