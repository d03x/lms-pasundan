<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TugasSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('login', LoginController::class)->name('login');
Route::post('login', [LoginController::class, 'checkLogin'])->name('login.check');
Route::middleware('authenticated')->group(function () {
    Route::get('/', DashboardController::class)->name('home');
    Route::middleware('authenticated:siswa')->group(function () {
        Route::get('/siswa/materi', [MateriController::class, 'materi'])->name('siswa.materi');
        Route::get('/siswa/tugas', TugasSiswaController::class)->name('siswa.tugas');
        Route::get('/siswa/materi/{id}', [MateriController::class, 'view'])->name('siswa.materi.view');
    });
});
