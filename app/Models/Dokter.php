<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    use HasFactory;

    protected $table = "dokters";
    protected $fillable = ['nama_dokter', 'poliklinik_id'];

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }

    public function jadwalPraktik()
    {
        return $this->hasOne(JadwalPraktikDokter::class);
    }
}
