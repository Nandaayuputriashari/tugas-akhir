<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::insert([
            [
                'no_kriteria' => '1',
                'nama_kriteria' => 'Visi, Misi, Tujuan, dan Strategi',
                'instrumen_akreditasi_id' => 1, // pastikan id ini ada di tabel instrumen_akreditasis
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_kriteria' => '2',
                'nama_kriteria' => 'Tata Pamong, Tata Kelola, dan Kerjasama',
                'instrumen_akreditasi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
