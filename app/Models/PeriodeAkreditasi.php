<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeAkreditasi extends Model
{
    use HasFactory;
    protected $fillable = ['program_studi_id', 'penyelenggara_akreditasi_id', 'instrumen_akreditasi_id', 'periode', 'status'];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }

    public function penyelenggaraAkreditasi()
    {
        return $this->belongsTo(PenyelenggaraAkreditasi::class, 'penyelenggara_akreditasi_id');
    }
    public function instrumenAkreditasi()
    {
        return $this->belongsTo(InstrumenAkreditasi::class, 'instrumen_akreditasi_id');
    }
}
