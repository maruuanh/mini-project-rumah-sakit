<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PendaftaranPasien extends Model
{
    use HasFactory;


    protected $table = 'pendaftaran_pasiens';
    protected $fillable = ['no_rekam_medis', 'nik', 'nama_lengkap', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'no_telepon'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->no_rekam_medis = (string) Str::uuid();
        });
    }
}
