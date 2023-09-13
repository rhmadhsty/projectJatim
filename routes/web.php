<?php

use App\Events\PostAnnouncement;
use App\Http\Controllers\dataSiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\siswaController;

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

Route::get('testNotif/', function () {
    return event(new App\Events\PostAnnouncement('data test'));
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/home', function() {
        return view('admin.home');
    });
    Route::resource('data_guru', guruController::class);
    Route::resource('data_siswa', siswaController::class);
    Route::resource('rekap', RekapController::class);
    Route::resource('data_kelas', KelasController::class);
    Route::resource('data_kelas.getData', dataSiswaController::class);
});

Route::group(['middleware' => ['auth', 'role:guru']], function() {
    Route::get('/beranda', function() {
        return view('guru.beranda');
    });
});
