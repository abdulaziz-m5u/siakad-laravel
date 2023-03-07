<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','is_admin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    // jurusan crud
    Route::resource('jurusan', \App\Http\Controllers\Admin\JurusanController::class)->except('show');
    Route::resource('program_study', \App\Http\Controllers\Admin\ProgramStudyController::class)->except('show');
    Route::resource('mata_kuliah', \App\Http\Controllers\Admin\MataKuliahController::class)->except('show');
    Route::resource('mahasiswa', \App\Http\Controllers\Admin\MahasiswaController::class);
    Route::resource('tahun_akademik', \App\Http\Controllers\Admin\TahunAkademikController::class);
    // krs
    Route::get('krs/create/{nim}/{tahun_akademik}', [\App\Http\Controllers\Admin\KrsController::class, 'create'])->name('krs.create');
    Route::get('krs', [\App\Http\Controllers\Admin\KrsController::class, 'index'])->name('krs.index');
    Route::post('krs', [\App\Http\Controllers\Admin\KrsController::class, 'find'])->name('krs.find');
    Route::post('krs/store', [\App\Http\Controllers\Admin\KrsController::class, 'store'])->name('krs.store');
    Route::get('krs/{krs:id}/edit', [\App\Http\Controllers\Admin\KrsController::class, 'edit'])->name('krs.edit');
    Route::put('krs/{krs:id}', [\App\Http\Controllers\Admin\KrsController::class, 'update'])->name('krs.update');
    Route::delete('krs/{krs:id}', [\App\Http\Controllers\Admin\KrsController::class, 'destroy'])->name('krs.destroy');
    // khs
    Route::get('khs', [\App\Http\Controllers\Admin\KhsController::class, 'index'])->name('khs.index');
    Route::post('khs', [\App\Http\Controllers\Admin\KhsController::class, 'find'])->name('khs.find');
    // input nilai
    Route::get('input_nilai',[\App\Http\Controllers\Admin\InputNilaiController::class, 'index'])->name('input_nilai.index');
    Route::post('input_nilai',[\App\Http\Controllers\Admin\InputNilaiController::class, 'all'])->name('input_nilai.all');
    Route::post('input_nilai/store',[\App\Http\Controllers\Admin\InputNilaiController::class, 'store'])->name('input_nilai.store');
    // transkrip nilai
    Route::get('transkrip_nilai', [\App\Http\Controllers\Admin\TranskripNilaiController::class, 'index'])->name("transkrip_nilai.index");
    Route::post('transkrip_nilai', [\App\Http\Controllers\Admin\TranskripNilaiController::class, 'find'])->name("transkrip_nilai.find");

    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});
