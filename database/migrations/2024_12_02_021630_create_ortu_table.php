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
        Schema::create('ortu', function (Blueprint $table) {
            $table->id('id_ortu'); // Primary key
            $table->integer('nmr_kk'); // Nomor KK (wajib diisi)
            $table->string('nm_ayah', 100); // Nama Ayah (wajib diisi)
            $table->string('nik_ayah', 20); // NIK Ayah (wajib diisi)
            $table->date('tgl_lhr_ayah'); // Tanggal Lahir Ayah (wajib diisi)
            $table->string('tmpt_lhr_ayah', 100); // Tempat Lahir Ayah (wajib diisi)
            $table->text('almt_ayah'); // Alamat Ayah (wajib diisi)
            $table->string('pekerjaan_ayah', 100); // Pekerjaan Ayah (wajib diisi)
            $table->string('nmr_ayah_wa', 15); // Nomor WA Ayah (wajib diisi)

            $table->string('nm_ibu', 100); // Nama Ibu (wajib diisi)
            $table->string('nik_ibu', 20); // NIK Ibu (wajib diisi)
            $table->date('tgl_lhr_ibu'); // Tanggal Lahir Ibu (wajib diisi)
            $table->string('tmpt_lhr_ibu', 100); // Tempat Lahir Ibu (wajib diisi)
            $table->text('almt_ibu'); // Alamat Ibu (wajib diisi)
            $table->string('pekerjaan_ibu', 100); // Pekerjaan Ibu (wajib diisi)
            $table->string('nmr_ibu_wa', 15); // Nomor WA Ibu (wajib diisi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ortu');
    }
};