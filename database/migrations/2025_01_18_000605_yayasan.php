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
        Schema::create('yayasan', function (Blueprint $table) {
            $table->id('id_yayasan');
            $table->string('deskripsi');

            $table->string('alasan_memilih_1');
            $table->string('alasan_memilih_2');
            $table->string('alasan_memilih_3');
            $table->string('alasan_memilih_4');
            $table->string('alasan_memilih_5');
            $table->string('alasan_memilih_6');

            $table->string('keunggulan');
            $table->string('visi_misi');

            $table->string('alur_pendaftaran_1');
            $table->string('alur_pendaftaran_2');
            $table->string('alur_pendaftaran_3');
            $table->string('alur_pendaftaran_4');
            $table->string('alur_pendaftaran_5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yayasan');
    }
};
