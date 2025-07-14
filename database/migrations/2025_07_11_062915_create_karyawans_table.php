<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->nullable(); // Nomor Induk Dosen Nasional
            $table->string('nitk')->nullable(); // Nomor Induk Tenaga Kep   endidikan
            $table->string('nip')->nullable(); // Nomor Induk Pegawai
            $table->string('email')->unique()->nullable(); // Email karyawan
            $table->string('telepon')->nullable(); // Nomor telepon karyawan
            $table->string('alamat')->nullable(); // Alamat karyawan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
