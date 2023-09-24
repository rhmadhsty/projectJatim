<?php

namespace App\Http\Controllers;

use App\Exports\ExportRekap;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

// use Maatwebsite\Excel;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        // $startDate = $request['start_date'];
        // $endDate = $request['end_date'];
        // if ($startDate = $request['start_date'] || ($endDate = $request['end_date'])) {
        //     // dd($startDate = $request['end_date']);
        //     $start_date = Carbon::parse($startDate = $request['start_date'])->toDateTimeString();
        //     $end_date = Carbon::parse($endDate = $request['end_date'])->toDateTimeString();
        //     $data = Absensi::whereBetween('tanggal', [$start_date, $end_date])->get();
        //     // dd($data);
        // // $export = Excel::download(new ExportRekap, 'rekapSiswa'. $start_date . '-'. $end_date .'.xlsx');
        //     // return view('admin.rekap', compact('siswa'));
        //     // dd($data);
        // // return view('admin.rekap', compact('data'));
        // return Excel::download(new ExportRekap($data), 'rekapSiswa.xlsx');
        // } else {
            $data = Absensi::get();
        // }


        return view('admin.rekap', compact('data'));
    }

    public function export_excel(Request $request)
    {
        // dd($request);
            // ini error terus masuk ke Exportrekap juga error
            // EMAIL PASSWORDNA NAON? rhmadhsty@gmail.com pass na 1-8
        Excel::download(new ExportRekap, 'rekapSiswa.xlsx');
        Alert::success('kelasss', 'heheheheh');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
