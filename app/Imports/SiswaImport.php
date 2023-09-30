<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaImport implements ToModel
{
    /**
    * @param Collection $collection
    */

    public function model(array $row)
    {
        $kelas = Kelas::get();
        dd($kelas);


        if ($row['0'] == $kelas->kelas) {
            $kelas_id = Kelas::where('kelas', $row['0']);
        }
        return new User([
            'kelas_id'=>$row,
        ]);
    }
}
