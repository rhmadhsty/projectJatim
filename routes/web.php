<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\dataSiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\siswaController;
use App\Models\Absensi;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/home', function() {
        $sakit = Absensi::where('status', 'sakit');
        $izin = Absensi::where('status', 'izin');
        $alfa = Absensi::where('status', 'alfa');
        return view('admin.home', compact('sakit', 'izin', 'alfa'));
    });
    Route::resource('data_guru', guruController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('data_siswa', siswaController::class);
    Route::resource('rekap', RekapController::class);
    Route::get('export_excel', [RekapController::class, 'export_excel'])->name('export_excel');
    Route::resource('data_kelas', KelasController::class);
    Route::resource('data_kelas.getData', dataSiswaController::class);
});

Route::group(['middleware' => ['auth', 'role:guru']], function() {
    Route::get('/beranda', function() {
        return view('guru.beranda');
    });
});
