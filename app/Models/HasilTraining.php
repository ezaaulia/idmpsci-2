<?php

namespace App\Models;

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
        'data_siswas_id',
        'nilai_tes_id',
        // 'nis', 
        // 'nama', 
        // 'asal',
        // 'nilai_tes_mtk', 
        // 'nilai_tes_ipa', 
        // 'nilai_tes_agama', 
        // 'nilai_tes_bindo',
        'status_kelas',
        'hasilmd',
    ];

    public function allData()
    {
        return DB::table('hasil_trainings')
            ->leftJoin('data_siswas', 'data_siswas.id', '=', 'hasil_trainings.id')
            ->leftJoin('nilai_tes', 'nilai_tes.id', '=', 'hasil_trainings.id')
            ->get();
    }

    public function nilai_tes()
    {
        return $this->hasOne(NilaiTes::class, 'nilai_tes_id');
    }
}
