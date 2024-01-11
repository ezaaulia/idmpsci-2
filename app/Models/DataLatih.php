<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataLatih extends Model
{

    protected $table = 'data_latih';

      /**
     * Daftar kolom yang dapat diisi secara massal dalam model Student.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nilai_tes_mtk', 
        'nilai_tes_ipa', 
        'nilai_tes_agama', 
        'nilai_tes_bindo',
        'hasil_mining',
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
