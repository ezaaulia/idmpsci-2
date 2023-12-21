<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'username',
        'alamat',
        'no_hp',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    // protected function role(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => ["admin", "operator"][$value],
    //     );
    // }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }
    // protected $guard = 'admin';

    // public function roleuser()
    // {
    //     return $this->hasMany(RoleUser::class);
    // }
    
    //ini untuk edit data siswa
    // public function editp($id, $profil)
    // {
    //     DB::table('users')
    //         ->where('id', $id)
    //         ->update($profil);
    // }
}
