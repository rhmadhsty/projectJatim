<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'absensi_id';

    public function absensiSiswa(){
        return $this->belongsTo(Siswa::class, 'absensi_id');
    }

    public function absensiGuru()
    {
        return $this->belongsTo(User::class, 'absensi_id');
    }
}
