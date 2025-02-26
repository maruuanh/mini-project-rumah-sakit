<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    //
    use HasFactory;

    protected $table = "polikliniks";
    protected $fillable = ['nama_poli'];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'poliklinik_id');
    }
}
