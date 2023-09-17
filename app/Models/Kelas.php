<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';

    protected $fillable = ['kelas', 'jurusan'];

    // satu data kelas ke banyak data siswa
    // jadi bisa disimpulkan untuk melakukan Belongs to di model kelas

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search){
            $query
                ->where('kelas', 'like' , '%' . $search . '%')
                ->orwhere('jurusan', 'like' , '%' . $search . '%');
        });
    }

    public function kelasSiswa()
    {
        return $this->hasMany(Siswa::class, 'siswa_id');
    }
}
