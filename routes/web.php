<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporansController;
use App\Http\Controllers\PenangananController;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return view('home');
})->name('home');
// Route::get('/home', function () {
//     return view('home.index', [
//         'title' => 'Pentingnya Kebersihan Kampus',
//         'section_title' => 'Tentang Kebersihan'
//     ]);
// })->name('home.index');
// Route::get('/laporan', [LaporansController::class, 'index'])->name('laporan.index');
// Route::get('laporan/create', [LaporansController::class, 'create'])->name('laporan.create');

// Route::post('/laporan/store', [LaporansController::class, 'store'])->name('laporan.store');

Route::resource('laporan', LaporansController::class);


Route::resource('petugas', PetugasController::class);

Route::resource('penanganan', PenangananController::class);
