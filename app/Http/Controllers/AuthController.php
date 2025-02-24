<?php

namespace App\Http\Controllers;


use App\Models\PendaftaranPasien;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function show_pendaftaran()
    {
        return view('pendaftaran-pasien');
    }

    public function daftar(Request $request)
    {

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
    }
}
