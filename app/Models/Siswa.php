<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'siswa_id';
    protected $fillable = [
        'nama',
        'nis',
        'username',
        'email',
        'password',
        'telepon',
        'tanggal_lahir',
        'kelas_id',
    ];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search){
            $query
                ->where('nama', 'like' , '%' . $search . '%')
                ->orwhere('nis', 'like' , '%' . $search . '%')
                ->orwhere('kelas_id', 'like' , '%' . $search . '%');
        });
    }

    // Belong to ke data kelas
    public function siswaKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // tah ke ini 
    public function SiswaAbsensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }
}
