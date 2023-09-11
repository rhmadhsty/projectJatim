<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DB::user();

        User::create([
            'name' => 'Rahma Fitriani',
            'role' => 'admin',
            'email' => 'rhmadhsty@gmail.com',
            'password' => Hash::make('12345678'),
            'divisi' => 'Hubungan Industri',
            'nik' => '123',
            'tanggal_lahir' => '2004-11-18',
            'no_telp' => '234',
        ]);

        // User::create([
        //     'name' => 'Rahma Adhisty',
        //     'role' => 'guru',
        //     'email' => 'rahmaadhisty@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'divisi' => 'Guru Produktif',
        //     'nik' => '321',
        //     'tanggal_lahir' => '2004-10-18',
        //     'no_telp' => '233',
        // ]);

        Kelas::create([
            'kelas' => '10',
            'jurusan' => 'Rekayasa Perangkat Lunak 1',
        ]);
        Kelas::create([
            'kelas' => '10',
            'jurusan' => 'Rekayasa Perangkat Lunak 2',
        ]);

        Kelas::create([
            'kelas' => '11',
            'jurusan' => 'Rekayasa Perangkat Lunak 1',
        ]);

        Kelas::create([
            'kelas' => '11',
            'jurusan' => 'Rekayasa Perangkat Lunak 2',
        ]);

        Kelas::create([
            'kelas' => '12',
            'jurusan' => 'Rekayasa Perangkat Lunak 1',
        ]);

        Kelas::create([
            'kelas' => '12',
            'jurusan' => 'Rekayasa Perangkat Lunak 2',
        ]);

        // CREATE DATA SISWA SEED
        Siswa::create([
            'kelas_id' => 1,
            'nis' => '202110469',
            'username' => 'Natasha',
            'nama' => 'Natashya Slavina',
            'email' => 'natashya@gmail.com',
            'password' => Hash::make('password'),
            'tanggal_lahir' => '2006-1-10',
            'telepon' => '085723465869',
            'is_active' => 1
        ]);

        // Siswa::create([
        //     'nama' => 'Rahma Fitriani Adhisty',
        //     'nis' => '0048965237',
        //     'kelas_id' => '6',
        // ]);
    }
}
