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
            $table->text('deskripsi');

            $table->text('alasan_memilih_1');
            $table->text('alasan_memilih_2');
            $table->text('alasan_memilih_3');
            $table->text('alasan_memilih_4');
            $table->text('alasan_memilih_5');
            $table->text('alasan_memilih_6');

            $table->text('keunggulan');
            $table->text('visi_misi');

            $table->text('alur_pendaftaran_1');
            $table->text('alur_pendaftaran_2');
            $table->text('alur_pendaftaran_3');
            $table->text('alur_pendaftaran_4');
            $table->text('alur_pendaftaran_5');
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
