<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user admin default
        User::updateOrCreate(
            [ 'email' => 'admin@example.com' ],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Ganti password sesuai kebutuhan
                'email_verified_at' => now(),
                'role' => 'admin', // jika ada kolom role
            ]
        );

    }
}
