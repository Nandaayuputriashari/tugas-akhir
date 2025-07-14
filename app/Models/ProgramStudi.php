<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_prodi',
        'jenjang',
        'upps',
        'alamat',
        'email',
        'telp',
        'sk_pembukaan',
        'tgl_sk',
        'thn_pembukaan',
        'peringkat_terbaru',
        'sk_ban_pt',
    ];

    public function periodeAkreditasis()
{
    return $this->hasMany(PeriodeAkreditasi::class);
}
}
