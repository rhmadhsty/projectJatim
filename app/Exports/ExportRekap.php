<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

// use App\Exports\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithHeadings as ConcernsWithHeadings;

class ExportRekap implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //  $data = Absensi::query()
        //     ->with('absensiSiswa')
        //     ->get();
        // dd($data);
        // return $data;
        if ($startDate = request()->input('start_date') || $endDate = request()->input('end_date')) {
            // dd($startDate = $request['end_date']);
            $start_date = Carbon::parse($startDate = request()->input('start_date'))->toDateTimeString();
            $end_date = Carbon::parse($endDate = request()->input('end_date'))->toDateTimeString();
            return Absensi::whereBetween('tanggal', [$start_date, $end_date])->with('absensiSiswa', 'absensiGuru')->get();
        } else {
            return redirect()->route('rekap.index')->with('error', 'Error Export');
        }
    }

    // public function query()
    // {
    //     return Absensi::query()->with('absensiSiswa')->get();
    // }

    // public function headings()
    // {
    //     return ['absensi_id'];
    // }

    public function headings(): array
    {
        // $absensi_id =
        return ['Nama Guru', 'Nama Siswa', 'NIS', 'status', 'keterangan'];
    }

    public function map($absensi): array
    {
        // $absensi = Absensi::with('absensiSiswa')->first();
        // dd($absensi);

        return [
            ($data_user = $absensi->absensiGuru->name),
            ($data_user = $absensi->absensiSiswa->nama),
            ($data_user = $absensi->absensiSiswa->NIS),
            ($data_user = $absensi->status),
            ($data_user = $absensi->keterangan),
            // $user=nama,
            // $user='nama',
            // $user='nama',
            // $user='nama',
        ];
    }
}
