<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pendaftaran-pasien', [AuthController::class, 'show_pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [AuthController::class, 'daftar'])->name('pendaftaran.daftar');

Route::get('/registrasi-pasien', [RegisterController::class, 'show_registrasi'])->name('registrasi');
Route::post('/registrasi-pasien', [RegisterController::class, 'regis'])->name('registrasi.regis');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
