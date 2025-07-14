<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengisiBorang extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode_akreditasi_id',
        'karyawan_id',
        'kriteria_id',
        'jabatan',
    ];

    public function periodeAkreditasi()
    {
        return $this->belongsTo(PeriodeAkreditasi::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
