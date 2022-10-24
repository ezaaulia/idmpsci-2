<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    use HasFactory;

    protected $table = 'import_data';

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

}
