<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumenAkreditasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'nama',
        'penyelenggara_akreditasi_id',
    ];

    public function penyelenggaraAkreditasi()
    {
        return $this->belongsTo(PenyelenggaraAkreditasi::class);
    }
}
