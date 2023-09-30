<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSiswaRequest;
use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Services\SiswaService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class dataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected SiswaService $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }
    public function index($id)
    {
        $siswa = Siswa::where('kelas_id', $id)
            ->filter(request(['search']))
            ->get();
        $kelas = Kelas::where('kelas_id', '=' ,$id)->get();
        // dd($kelas['kelas_id']);
        return view('admin.siswa.getData', compact('siswa', 'kelas'));
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
    public function store(SiswaRequest $request, $id)
    {
        // dd($request);
        try {
            // validasi data siswa yang dikirim dari siswaRequest
            $request->validate([
                'image-siswa'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // mengecek apakah ada data image atau tidak
            if ($request->file('image-siswa')) {
                $dataImage = $request->file('image-siswa')->store('siswa-images');
            }
            $this->siswaService->create($request->all(), $dataImage);
            Alert::success('Berhasil', 'Berhasil Menambahkan data Siswa');
            return back();
        } catch (Exception $Exceptation) {
            Alert::warning('Gagal', 'Gagal Menambahkan data Siswa');
            return back();
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
    public function update(EditSiswaRequest $request, Siswa $model)
    {
        // try{
        //     $data = [
        //         'kelas_id' => $request['kelas_id'],
        //         'nama' => $request['nama'],
        //         'NIS' => $request['NIS'],
        //     ];

        //     $this->siswaService->update($model, $data);
        //     Alert::success('Berhasil', 'Siswa Berhasil di Edit');
        //     return back();
        // }
        // catch(Exception $exception){
        //     Alert::warning('Gagal', 'siswa gagal di Edit');
        //     return back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
