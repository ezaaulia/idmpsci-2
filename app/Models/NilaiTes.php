<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NilaiTes extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('nilai_tes')->get();
    }

    public function DataSiswa()
    {
        return $this->hasOne(DataSiswa::class);
    }

    public function insertNil($insertn)
    {
         DB::table('nilai_tes')->insert($insertn);
    }

    protected $guarded = [
        'id', 'nama', 'status_kelas',
    ];
    // public function lihatnilai($users_id)
    // {
    //     return DB::table('nilai_tes')->where('users_id', $users_id)->first();

    // }
}
