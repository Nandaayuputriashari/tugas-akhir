<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;        
use App\Models\ProgramStudi;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_prodi' => 'Teknik Informatika',
                'jenjang' => 'S1',
                'upps' => 'Fakultas Teknik',
                'alamat' => 'Jl. Raya Teknologi No. 1',
                'email' => 'informatika@example.com',
                'telp' => '082112345678',
                'sk_pembukaan' => 'SK-123/TI',
                'tgl_sk' => '2010-08-01',
                'thn_pembukaan' => '2010',
                'peringkat_terbaru' => 'Unggul',
                'sk_ban_pt' => 'BAN-PT/SK/2023/01'
            ],
            [
                'nama_prodi' => 'Sistem Informasi',
                'jenjang' => 'S1',
                'upps' => 'Fakultas Ilmu Komputer',
                'alamat' => 'Jl. Sistem No. 12',
                'email' => 'si@example.com',
                'telp' => '081234567890',
                'sk_pembukaan' => 'SK-456/SI',
                'tgl_sk' => '2012-05-10',
                'thn_pembukaan' => '2012',
                'peringkat_terbaru' => 'Baik Sekali',
                'sk_ban_pt' => 'BAN-PT/SK/2022/02'
            ]
        ];

        foreach ($data as $item) {
            ProgramStudi::create($item);
        }
    }
}
