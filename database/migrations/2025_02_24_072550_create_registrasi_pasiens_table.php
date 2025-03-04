<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrasi_pasiens', function (Blueprint $table) {
            $table->id();
            $table->uuid('no_rekam_medis');
            $table->foreign('no_rekam_medis')->references('no_rekam_medis')->on('pendaftaran_pasiens')->onDelete('cascade');
            $table->foreignId('jadwal_praktik_dokters_id')->constrained('jadwal_praktik_dokters')->onDelete('cascade');
            $table->time('jam_registrasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
