<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'divisi',
        'nik',
        'no_telp',
        'tanggal_lahir',
<<<<<<< HEAD
        // 'image_user',
=======
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3
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
        'password' => 'hashed',
    ];

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orwhere('email', 'like', '%' . $search . '%')
                ->orwhere('divisi', 'like', '%' . $search . '%')
                ->orwhere('nik', 'like', '%' . $search . '%')
                ->orwhere('tanggal_lahir', 'like', '%' . $search . '%')
                ->orwhere('no_telp', 'like', '%' . $search . '%')
                ->orwhere('role', 'like', '%' . $search . '%');
        });
    }

    public function absenSiswa()
    {
        return $this->hasMany(Absensi::class, 'user_id');
    }
}
