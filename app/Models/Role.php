<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
       'nama', 
       'email', 
       'username', 
       'alamat', 
       'no_hp', 
       'password',
   ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
