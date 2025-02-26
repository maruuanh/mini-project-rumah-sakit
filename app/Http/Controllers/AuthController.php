<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranPasien;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Menampilkan form pendaftaran
    public function show_pendaftaran()
    {
        $pasien = session('pendaftaran_pasien');

        if ($pasien) {
            return redirect()->route('registrasi', compact('pasien'));
        }
        return view('pendaftaran-pasien');
    }

    // Proses pendaftaran pasien
    public function daftar(Request $request)
    {

        // Validasi input
        $request->validate([
            'nik' => 'required|unique:pendaftaran_pasiens|string',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|integer',
        ]);
        // Simpan data ke database (UUID dibuat otomatis di model)
        $pasien = PendaftaranPasien::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
        ]);

        // Simpan data ke session
        session(['pendaftaran_pasien' => $pasien]);

        // Redirect ke halaman registrasi pasien dengan pesan sukses
        return redirect()->route('registrasi')->with('success', 'Pendaftaran berhasil! Silakan lanjut ke registrasi.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('pendaftaran')->with('success', 'Anda telah logout.');
    }
}
