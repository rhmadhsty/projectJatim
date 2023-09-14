<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSiswaRequest;
// use App\Http\Requests\EditSiswaRequest;
use App\Models\Kelas;
use App\Models\siswa;
use App\Services\SiswaService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected SiswaService $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }

    public function index()
    {
        $siswa = siswa::latest()
            ->filter(request(['search']))
            ->get();
        $kelas = Kelas::get();
        return view('admin.dataSiswa', compact('siswa', 'kelas'));
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
    public function update(EditSiswaRequest $request, Siswa $model)
    {
        // dd($request);
        try {
            $data = [
                'siswa_id' => $request['siswa_id'],
                'kelas_id' => $request['kelas_id'],
                'nis' => $request['nis'],
                'nama' => $request['nama'],
                'telepon' => $request['telepon'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            // dd($data);
            // $this->siswaService->update($model, $data);
            $this->siswaService->update($model, $data);
            Alert::success('Berhasil', 'Siswa Berhasil di Edit');
            return back();
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'siswa gagal di Edit');
            // return back();
            abort(502, $Exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa, $id)
    {
        try {
            $siswa = siswa::find($id);
            if ($siswa->SiswaAbsensi->count() > 0) {
                Alert::warning('Gagal', 'Gagal Mengahapus data siswa,dikarenakan absensi siswa yang terhubung dengan data ini');
                return back();
            } else {
                $this->siswaService->delete($siswa, $id);
                Alert::success('Berhasil', 'Berhasil Hapus Data Siswa!');
                return back();
            }
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'Gagal Mengahapus data siswa');
            return back();
        }
    }
}
