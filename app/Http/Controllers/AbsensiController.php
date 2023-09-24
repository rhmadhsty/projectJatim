<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsensiRequest;
use App\Models\Absensi;
use App\Models\User;
use App\Services\AbsensiService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected AbsensiService $absensiService;

    public function __construct(AbsensiService $absensiService)
    {
        $this->absensiService = $absensiService;
    }
    public function index()
    {
        //
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
    public function store(AbsensiRequest $request)
    {
        // dd(Auth::user()->user_id);
        try {
            $data = [
                'user_id' => Auth::user()->user_id,
                'siswa_id' => $request['siswa_id'],
                'status' => $request['status'],
                'keterangan' => $request['keterangan'],
                'tanggal' => Carbon::now()->format('Y-m-d'),
            ];

            $this->absensiService->create($data);
            Alert::success('Berhasil', 'Berhasil Menambah Data !');
            return back();
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'Gagal Menambahkan Absensi SIswa !');
        }
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
