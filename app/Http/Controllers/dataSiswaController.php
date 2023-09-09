<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Services\SiswaService;
use Exception;
use Illuminate\Http\Request;

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
        $siswa = Siswa::where('kelas_id', $id)->get();
        $kelas = Kelas::get();
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
        try{
            $this->siswaService->create($request->all());
            return back();
        }catch(Exception $Exceptation){
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
