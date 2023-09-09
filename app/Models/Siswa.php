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
        'NIS',
        'kelas_id',
    ];

    // Belong to ke data kelas
    public function siswaKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
