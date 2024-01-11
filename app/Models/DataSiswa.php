<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{

    protected $table = 'data_siswas';
    
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
        'kelas',
        'hasil_mining'
    ];

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['search']) ? $filters['search'] : false)
        {
            return $query->where('nis', 'LIKE', '%'.$filters['search'].'%')
                ->orWhere('nama', 'LIKE', '%'.$filters['search'].'%');
        }
    }

        /**
     * Menentukan apakah model akan menggunakan timestamps.
     *
     * @var bool
     */
    public $timestamps = true;

}
