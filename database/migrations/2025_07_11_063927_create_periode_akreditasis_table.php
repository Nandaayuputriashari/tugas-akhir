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
        Schema::create('periode_akreditasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_studi_id')->constrained()->onDelete('cascade');
            $table->foreignId('penyelenggara_akreditasi_id')->constrained('penyelenggara_akreditasis')->onDelete('cascade');
            $table->foreignId('instrumen_akreditasi_id')->constrained('instrumen_akreditasis')->onDelete('cascade');
            $table->string('periode'); // contoh: 2024–2029
            $table->string('status'); // contoh: Proses, Selesai, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_akreditasis');
    }
};
