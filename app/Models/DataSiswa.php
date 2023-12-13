<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiTes;

class DataSiswa extends Model
{
     /**
     * Daftar kolom yang dapat diisi secara massal dalam model Student.
     *
     * @var array
     */
    use HasFactory;

    protected $table = 'data_siswas';

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

    public function allData()
    {
        return DB::table('data_siswas')->get();
    }

    // public function nilai_tes()
    // {
    //     return $this->hasOne(NilaiTes::class, 'data_siswas_id');
    // }

//     public function scopePilihKelas($query, $hasil_mining)
// {
//     return $query->where('status_kelas', $hasil_mining);
// }
   
    

}
