<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'siswa';
    protected $primaryKey = 'siswa_id';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Belong to ke data kelas
    public function siswaKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
