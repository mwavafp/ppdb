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
            $table->enum('kk',['diserahkan','belum_diserahkan'])->default('belum_diserahkan');
            $table->enum('srt_pernyataan',['diserahkan','belum_diserahkan'])->default('belum_diserahkan');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            
            
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
