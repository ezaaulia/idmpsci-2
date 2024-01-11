<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilMining extends Model
{
    
    protected $table = 'hasilmining';

    protected $fillable = [
        'id',
        'data_siswas_id',
        'hasil',
    ];


    public function data_testing()
    {
        return $this->hasOne(DataLatih::class, 'data_testing_id');
    }
}
