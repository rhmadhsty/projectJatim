<?php

namespace App\Http\Controllers;

use App\Http\Requests\editKelasRequest;
use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Services\KelasService;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected KelasService $kelasService;

    public function __construct(KelasService $kelasService)
    {
        $this->kelasService = $kelasService;
    }

    public function index()
    {
        $kelas = Kelas::latest()
            ->filter(request(['search']))
            ->get();
        $siswa = Siswa::get();
        // dd($kelas);
        return view('admin.dataKelas', compact('kelas', 'siswa'));
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
    public function store(KelasRequest $request)
    {
        // dd($request);
        try {
            $this->kelasService->create($request->all());
            // Alert::success('Berhasil', 'Berhasil Menambahkan Data!');
            Alert::success('Berhasil', 'Berhasil Menambahkan Data Kelas!');
            return redirect()->route('data_kelas.index');
        } catch (Exception $Exceptation) {
            Alert::warning('Gagal', 'Gagal Menambahkan Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $kelas = $this->kelasService->getData($id);

            return json_encode($kelas);
        } catch (Exception $Exception) {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::where('kelas_id', $id)->firstOrFail();
        return view('admin.edit_datakelas', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editKelasRequest $request, Kelas $model)
    {
        // dd($request->all());
        try {
            // Kelas = $kelas;
            $data = [
                'kelas_id' => $request['kelas_id'],
                'kelas' => $request['kelas'],
                'jurusan' => $request['jurusan'],
            ];
            $this->kelasService->update($model, $data);
            Alert::success('Berhasil', 'Kelas Berhasil di Edit');
            return redirect()->route('data_siswa.index');
        } catch (Exception $Exception) {
            //throw $th;
            Alert::warning('Gagal', 'Kelas gagal di Edit');
            abort(502, $Exception->getMessage());
            // follow me please SOK
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, $id)
    {
        try {
            $dataKelas = Kelas::find($id);

            if ($dataKelas->kelasSiswa->count() > 0) {
                Alert::warning('Gagal', 'Data Ini Tersambung dengan Data siswa !');
                return back();
            } else {
                $this->kelasService->delete($kelas, $id);
                Alert::success('Berhasil', 'Berhasil menghapus data kelas !');
                return back();
            }
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'Gagal Hapus Data Kelas!');
        }
    }
}
