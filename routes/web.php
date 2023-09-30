<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\dataSiswaController;
use App\Http\Controllers\DropzoneController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\siswaController;
use App\Models\Absensi;
use App\Models\Siswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();

Route::get('/forgotpass', function(){
    return view('auth.forgotpass');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/home', function() {
        $sakit = Absensi::where('status', 'sakit');
        $izin = Absensi::where('status', 'izin');
        $alfa = Absensi::where('status', 'alfa');
        $jumlah_siswa = Siswa::get();
        return view('admin.home', compact('sakit', 'izin', 'alfa', 'jumlah_siswa'));
    });
    Route::resource('data_guru', guruController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('data_siswa', siswaController::class);
    Route::resource('rekap', RekapController::class);
    Route::get('export_excel', [RekapController::class, 'export_excel'])->name('export_excel');
    Route::resource('data_kelas', KelasController::class);
    Route::resource('data_kelas.getData', dataSiswaController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::post('user-import', [guruController::class, 'import'])->name('guru.import');
    Route::post('kelas-import', [KelasController::class, 'import'])->name('kelas.import');
    Route::post('siswa-import', [siswaController::class, 'import'])->name('siswa.import');
    Route::get('guru-search', [guruController::class, 'search'])->name('guru.search');
    Route::resource('coba', DropzoneController::class);
});

Route::group(['middleware' => ['auth', 'role:guru']], function() {
    Route::get('/beranda', function() {
        // $jumlah_siswa
        return view('guru.beranda');
    });
    Route::resource('absensi', AbsensiController::class);
    Route::get('siswa', [siswaController::class, 'tampil'])->name('siswa.tampil');
});
