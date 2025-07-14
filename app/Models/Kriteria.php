<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_kriteria',
        'nama_kriteria',
        'deskripsi_kriteria',
        'parent_kriteria', 'instrumen_akreditasi_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Kriteria::class, 'parent_kriteria');
    }

    public function children()
    {
        return $this->hasMany(Kriteria::class, 'parent_kriteria');
    }

        public function pengisiBorang()
    {
        return $this->hasMany(PengisiBorang::class);
    }
}
