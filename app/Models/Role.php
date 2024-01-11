<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    protected $table = 'roles';
    
    /**
    * Daftar kolom yang dapat diisi secara massal dalam model Student.
    *
    * @var array
    */
   protected $fillable = [
       'id',
       'users_id',
       'role', 
       'email', 
   ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
