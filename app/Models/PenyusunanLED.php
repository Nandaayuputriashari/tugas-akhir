<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyusunanLED extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode_akreditasi_id',
        'kriteria_id',
        'status',
    ];

    public function periodeAkreditasi()
    {
        return $this->belongsTo(PeriodeAkreditasi::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
