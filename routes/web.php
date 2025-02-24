<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pendaftaran-pasien', [AuthController::class, 'show_pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [AuthController::class, 'daftar'])->name('pendaftaran.daftar');
