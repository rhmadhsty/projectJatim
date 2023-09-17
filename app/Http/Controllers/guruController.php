<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GuruService;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Requests\editGuruRequest;
use RealRashid\SweetAlert\Facades\Alert;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected GuruService $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function index()
    {
        $guru = User::latest()
            ->filter(request(['search']))
            ->get();

        // dd($guru);
        return view('admin.dataGuru', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataGuruTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = [
                'name' => $request['name'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => $request['password'],
                'divisi' => $request['divisi'],
                'nik' => $request['nik'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'no_telp' => $request['no_telp'],
            ];

            $this->guruService->create($data);

            Alert::success('Berhasil', 'Berhasil Menambahkan Data Guru!');

            return redirect()->route('data_guru.index');
        } catch (Exception $Exceptation) {
            Alert::warning('Gagal', 'Gagal Menambahkan Data!');
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
    public function update(editGuruRequest $request, User $model)
    {
        // dd($request['email']);
        try {
            $data = [
                'user_id' => $request['user_id'],
                'name' => $request['name'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => $request['password'],
                'divisi' => $request['divisi'],
                'nik' => $request['nik'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'no_telp' => $request['no_telp'],
            ];
            // dd($data);
            $this->guruService->update($model, $data);
            Alert::success('Berhasil', 'Berhasil Edit Data Guru!');
            return back();
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'Gagal Mengedit Data Guru!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        // dd($id);
        try {
            $guru = User::find($id);
            // dd($guru);
            if ($guru->absenSiswa->count() > 0) {
                Alert::warning('Gagal', 'Data Ini Tersambung dengan Data Absensi siswa !');
                return redirect()->route('data_guru.index');
                // dd($guru);Ale
            } else {
                $this->guruService->delete($user, $id);

                Alert::success('Berhasil', 'Berhasil Hapus Data Guru!');
                return back();
            }
        } catch (Exception $Exception) {
            Alert::warning('Gagal', 'Gagal Hapus Data Guru!');
        }
    }
}
