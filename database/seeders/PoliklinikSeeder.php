<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('polikliniks')->insert([
            [
                'nama_poliklinik' => 'Poli Gigi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_poliklinik' => 'Poli Umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_poliklinik' => 'Poli Anak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
