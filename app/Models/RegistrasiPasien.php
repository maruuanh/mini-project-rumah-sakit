<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegistrasiPasien extends Model
{
    use HasFactory;


    protected $table = 'registrasi_pasiens';
    protected $fillable = ['no_rekam_medis', 'jadwal_praktik_dokters_id'];

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
