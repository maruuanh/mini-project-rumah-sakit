<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktikDokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan halaman registrasi pasien
    public function show_registrasi()
    {
        $jadwalPraktikDokter = JadwalPraktikDokter::with('dokter.poliklinik')->get();
        // Ambil data dari session

        $poliklinik = Poliklinik::all(['id', 'nama_poliklinik']);

        $pasien = session('pendaftaran_pasien');

        // Jika tidak ada data, redirect ke halaman pendaftaran
        if (!$pasien) {
            return redirect()->route('pendaftaran')->with('error', 'Silakan daftar terlebih dahulu.');
        }

        return view('registrasi-pasien', compact('pasien', 'jadwalPraktikDokter', 'poliklinik'));
    }

    public function regis() {}
}
