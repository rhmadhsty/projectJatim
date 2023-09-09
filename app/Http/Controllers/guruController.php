<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GuruService;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
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
        // dd($request);
        try {
            $this->guruService->create($request->all());

            Alert::success('Berhasil', 'Berhasil Menambahlan Data!');

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
