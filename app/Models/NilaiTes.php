<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\DataSiswa;

class NilaiTes extends Model
{
    use HasFactory;
    
    // public function insertNil($insertn)
    // {
    //      DB::table('nilai_tes')->insert($insertn);
    // }

    protected $table = 'nilai_tes';

    protected $fillable = [
        'id',
        'data_siswas_id',
        'nilai_tes_mtk', 
        'nilai_tes_ipa', 
        'nilai_tes_agama', 
        'nilai_tes_bindo',
        'status_kelas',
    ];

    public function allData()
    {
        return DB::table('nilai_tes')->get();
    }

    public function data_siswas()
    {
        return $this->belongsTo(DataSiswa::class);
    }

    public function hasil_trainings()
    {
        return $this->belongsTo(HasilTraining::class);
    }


    //ini untuk detail persiswa
    // public function detailNil($id)
    // {
    //     return DB::table('nilai_tes')->where('id', $id)->first();

    // }
    
}
