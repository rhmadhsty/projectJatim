<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'absensi_id';

    protected $guarded = ['absensi_id', 'created_at','updated_at'];

    public function absensiSiswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function absensiGuru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
