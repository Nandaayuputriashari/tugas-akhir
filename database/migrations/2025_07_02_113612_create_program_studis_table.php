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
         Schema::create('program_studis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_prodi');
        $table->string('jenjang');
        $table->string('upps');
        $table->text('alamat');
        $table->string('email');
        $table->string('telp');
        $table->string('sk_pembukaan');
        $table->date('tgl_sk');
        $table->string('thn_pembukaan');
        $table->string('peringkat_terbaru');
        $table->string('sk_ban_pt');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
