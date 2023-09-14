<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /**
     * Daftar kolom yang dapat diisi secara massal dalam model Student.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'nis', 
        'nama', 
        'asal', 
        'nilai_tes_mtk', 
        'nilai_tes_ipa', 
        'nilai_tes_agama', 
        'nilai_tes_bindo',
        'status_kelas',
    ];

    /**
     * Menentukan apakah model akan menggunakan timestamps.
     *
     * @var bool
     */
    public $timestamps = true;
}
