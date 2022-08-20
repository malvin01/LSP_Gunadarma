<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListKursusController;
use App\Http\Controllers\DataDiriMahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get(
        '/data-diri-mahasiswa',
        [DataDiriMahasiswaController::class, 'index']
    )->name('data-diri-mahasiswa.index');
    
    
    Route::post(
        '/data-diri-mahasiswa',
        [DataDiriMahasiswaController::class, 'uploadKrs']
    )->name('data-diri-mahasiswa.uploadKrs');

    Route::get(
        'data-diri-mahasiswa/{media}',
        [
            DataDiriMahasiswaController::class, 'downloadFile'
        ]
    )->name('data-diri-mahasiswa.downloadFile');

    

    //admin controller
    Route::resource('kursus', KursusController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::get(
        '/jadwal/{id}/pendaftaran',
        [JadwalController::class, 'pendaftaran']
    )->name('jadwal.pendaftaran');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('admin', AdminController::class);

    //user controller
    Route::get(
        '/list-kursus',
        [ListKursusController::class, 'index']
    )->name('list-kursus.index');

    Route::get(
        '/list-kursus/{id}/jadwal',
        [ListKursusController::class, 'jadwal']
    )->name('list-kursus.jadwal');

    Route::get(
        '/list-kursus/{id}/jadwal/{jadwalId}/detail',
        [ListKursusController::class, 'detailJadwal']
    )->name('list-kursus.list-jadwal.detailJadwal');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
