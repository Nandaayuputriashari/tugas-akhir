<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PenyelenggaraAkreditasi;

class PenyelenggaraAkreditasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_penyelenggara' => 'LAM INFOKOM'],
            ['nama_penyelenggara' => 'LAM TEKNIK'],
        ];

        foreach ($data as $item) {
            PenyelenggaraAkreditasi::create($item);
        }
    }
}
