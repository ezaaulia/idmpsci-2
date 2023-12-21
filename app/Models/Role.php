<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Role extends Authenticatable
{
    use HasFactory, Notifiable;

    // protected $fillable = [
    //     'nama',
    //     'email',
    //     'username',
    //     'alamat',
    //     'no_hp',
    //     'password',
    //     'role',
    // ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}
