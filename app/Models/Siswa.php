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
    protected $guarded = ['siswa_id', 'created_at', 'updated_at'];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('nama', 'like', '%' . $search . '%')
                ->orwhere('nis', 'like', '%' . $search . '%')
                ->orwhere('kelas_id', 'like', '%' . $search . '%');
        });
    }

    // Belong to ke data kelas
    public function siswaKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
