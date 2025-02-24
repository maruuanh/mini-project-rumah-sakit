<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\JadwalPraktikDokter;
use App\Models\Poliklinik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPraktikDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poliUmum = Poliklinik::create(['nama_poliklinik' => 'Poli Umum']);
        $poliGigi = Poliklinik::create(['nama_poliklinik' => 'Poli Gigi']);
        $poliAnak = Poliklinik::create(['nama_poliklinik' => 'Poli Anak']);


        $dokter1 = Dokter::create(['nama_dokter' => 'Dokter Tirta', 'poliklinik_id' => $poliGigi->id]);
        $dokter2 = Dokter::create(['nama_dokter' => 'Dokter Dewi', 'poliklinik_id' => $poliUmum->id]);
        $dokter3 = Dokter::create(['nama_dokter' => 'Dokter Bayu', 'poliklinik_id' => $poliAnak->id]);
        $dokter4 = Dokter::create(['nama_dokter' => 'Dokter Maya', 'poliklinik_id' => $poliUmum->id]);


        JadwalPraktikDokter::create([
            'dokter_id' => $dokter1->id,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '12:00:00',
        ]);

        JadwalPraktikDokter::create([
            'dokter_id' => $dokter2->id,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '12:00:00',
        ]);

        JadwalPraktikDokter::create([
            'dokter_id' => $dokter3->id,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '12:00:00',
        ]);

        JadwalPraktikDokter::create([
            'dokter_id' => $dokter4->id,
            'jam_mulai' => '12:00:00',
            'jam_selesai' => '14:00:00',
        ]);
    }
}
