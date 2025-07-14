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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('no_kriteria');
            $table->string('nama_kriteria');
            $table->text('deskripsi_kriteria')->nullable();
            $table->unsignedBigInteger('parent_kriteria')->nullable();
            $table->foreignId('instrumen_akreditasi_id')->constrained('instrumen_akreditasis')->onDelete('cascade');
            $table->timestamps();

            // Relasi ke diri sendiri jika nested
            $table->foreign('parent_kriteria')->references('id')->on('kriterias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
