<?php

namespace App\Http\Controllers;

use App\Events\PostAnnouncement;
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


    public function getData($id)
    {
        try {
            $kelas = $this->kelasService->getData($id);

            return json_encode($kelas);
        }catch (Exception $Exception)
        {
            return back();
        }
    }


    public function index()
    {
        $kelas = Kelas::get();
        $siswa = Siswa::get();

        broadcast(new PostAnnouncement($kelas))->toOthers();

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
        try{
            $this->kelasService->create($request->all());
            // Alert::success('Berhasil', 'Berhasil Menambahkan Data!');
            Alert()->success('Berhasil', 'Berhasil Menambahkan Data Kelas!');
            return redirect()->route('data_siswa.index');
        }
        catch(Exception $Exceptation){
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
        }catch (Exception $Exception)
        {
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
    public function update(editKelasRequest $request, $id)
    {
        dd($request);
        try {
            // Kelas = $kelas;
            $this->kelasService->update($id, $request->all());
            return route('data_siswa.index');
        } catch (Exception $Exception) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
