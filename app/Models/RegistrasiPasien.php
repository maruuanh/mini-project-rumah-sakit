<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegistrasiPasien extends Model
{
    use HasFactory;


    protected $table = 'registrasi_pasiens';
    protected $fillable = ['no_rekam_medis', 'jadwal_praktik_dokters_id', 'jam_registrasi'];
}
