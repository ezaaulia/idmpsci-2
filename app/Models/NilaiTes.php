<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTes extends Model
{
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

    public function data_siswas()
    {
        return $this->belongsTo(DataSiswa::class);
    }
}
