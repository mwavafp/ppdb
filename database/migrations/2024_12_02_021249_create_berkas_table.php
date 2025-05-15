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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id('id_brks');
            $table->unsignedBigInteger('id_user');
            $table->enum('kk', ['diserahkan', 'belum_diserahkan'])->default('belum_diserahkan');
            $table->enum('pas_foto', ['diserahkan', 'belum_diserahkan'])->default('belum_diserahkan');
            $table->enum('ijazah_akhir', ['diserahkan', 'belum_diserahkan'])->default('belum_diserahkan');
            $table->enum('kip', ['diserahkan', 'belum_diserahkan'])->default('belum_diserahkan');
            $table->enum('akta_lahir', ['diserahkan', 'belum_diserahkan'])->default('belum_diserahkan');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
