<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktikDokter;
use App\Models\RegistrasiPasien;
use App\Models\PendaftaranPasien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan halaman registrasi pasien
    public function show_registrasi()
    {
        $jadwalPraktikDokter = JadwalPraktikDokter::with('dokter.poliklinik')->get();

        $pasien = session('pendaftaran_pasien');

        if (!$pasien) {
            return redirect()->route('pendaftaran');
        }

        return view('registrasi-pasien', compact('pasien', 'jadwalPraktikDokter'));
    }

    public function regis(Request $request)
    {
        $validatedData  = $request->validate([
            'poliklinik_id' => 'required',
            'dokter_id' => 'required',
            'jadwal_id' => 'required|exists:jadwal_praktik_dokters,id',
        ]);

        $jadwal = JadwalPraktikDokter::where('id', $validatedData['jadwal_id'])
            ->where('dokter_id', $validatedData['dokter_id'])
            ->first();

        if (!$jadwal) {
            return redirect()->back()->withErrors(['jadwal_id' => 'Jadwal tidak ditemukan untuk dokter ini']);
        }

        $noRekamMedis = $request->input('no_rekam_medis');
        $pasien = PendaftaranPasien::where('no_rekam_medis', $noRekamMedis)->first();


        if (!$pasien) {
            return back()->withErrors(['no_rekam_medis' => 'Pasien tidak ditemukan dalam sistem.']);
        }

        $jamSekarang = now()->setTimezone('Asia/Jakarta');
        $jamMulaiPraktik = Carbon::parse($jadwal->jam_mulai);
        $batasWaktu = $jamMulaiPraktik->subMinutes(30);

        if ($jamSekarang->greaterThan($batasWaktu)) {
            return redirect()->back()->withErrors(['jadwal_id' => 'Registrasi ditutup, paling lambat registrasi dapat dilakukan 30 menit sebelum jam praktik dimulai!']);
        }

        RegistrasiPasien::create([
            'no_rekam_medis' => $pasien->no_rekam_medis,
            'jadwal_praktik_dokters_id' => $validatedData['jadwal_id'],
            'jam_registrasi' => now(),
        ]);

        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }
}
