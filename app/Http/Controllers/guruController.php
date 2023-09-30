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
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // pemanggilan untuk memudahkan memanggil file service
    protected GuruService $guruService;

    // penyambungan guru service dan dengan guru controller
    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $hasil_search = User::where('name', 'like', '%' . $search . '%')
        ->orwhere('email', 'like', '%' . $search . '%')
        ->orwhere('divisi', 'like', '%' . $search . '%')
        ->orwhere('nik', 'like', '%' . $search . '%')
        ->orwhere('tanggal_lahir', 'like', '%' . $search . '%')
        ->orwhere('no_telp', 'like', '%' . $search . '%')
        ->orwhere('role', 'like', '%' . $search . '%')->get();
        // dd($hasil_search);
        return response()->json($hasil_search);
    }

    public function index()
    {
        $guru = User::where('role', 'guru')
            ->latest()
            ->filter(request(['search']))
            ->get();

        // dd($guru);
        return view('admin.dataGuru', compact('guru'));
    }

    public function import()
    {
        Excel::import(new GuruImport(), request()->file('import-guru'));
        Alert::success('Berhasil Import!');
        return redirect()->back();
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
            // validasi data image yang ada di form storerequest
            $request->validate([
                'image_user' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // mengecek apakah ada image atau tidak
            if ($request->file('image_user')) {
                $dataImage = $request->file('image_user')->store('guru-images');
            }
            else {
                $dataImage = 'tidakada';
            }
            // $this->guruService->create($dataImage);
            // dd($dataImage);
            // pengiriman data ke guruservice untuk dimasukkan kedalam databse
            $this->guruService->create($request->all(), $dataImage);

            // notifikasi berhasil dimasukkan ke database
            Alert::success('Berhasil', 'Berhasil Menambahkan Data Guru!');

            // Kembali ke halaman guru.index
            return redirect()->route('data_guru.index');
        } catch (Exception $Exceptation) {
            // jika gagal memasukkan ke database
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
        // dd($request);
        try {
            // validasi data yang ada di form editgurustore
            $request->validate([
                'image_user' => 'image|file|max:2048',
            ]);
            // dd($data);

            //pengecekan apakah image ada foto atau tidak
            if ($request->file('image_user')) {
                $dataimage = $request->file('image_user')->store('guru-images');
            }
            // dd($data);

            // dd($dataimage);

            // mengirim data ke guru service untuk dimasukkan ke dalam database
            $this->guruService->update($dataimage, $model, $request->all());

            // notifikasi berhasil
            Alert::success('Berhasil', 'Berhasil Edit Data Guru!');

            // kembali ke dataguru
            return redirect()->back();
        } catch (Exception $Exception) {
            // notifikasi jika gagal menupdate
            Alert::warning('Gagal', 'Gagal Mengedit Data Guru!');
            return redirect()->back();
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
