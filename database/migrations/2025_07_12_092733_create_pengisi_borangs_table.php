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
        Schema::create('pengisi_borangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_akreditasi_id')->constrained()->onDelete('cascade');
        $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
        $table->foreignId('kriteria_id')->constrained('kriterias')->onDelete('cascade');
        $table->string('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengisi_borangs');
    }
};
