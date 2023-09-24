<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'name'=>$row['0'],
            'role'=>$row['1'],
            'email'=>$row['2'],
            'password'=>$row['3'],
            'divisi'=>$row['4'],
            'nik'=>$row['5'],
            'tanggal_lahir'=>$row['6'],
            'no_telp'=>$row['7'],
        ]);
    }
}
