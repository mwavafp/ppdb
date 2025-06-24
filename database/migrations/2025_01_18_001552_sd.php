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
        Schema::create('sd', function (Blueprint $table) {
            $table->id('id_sd');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_sd')->nullable();
            $table->string('gallery_sd_a')->nullable();
            $table->string('gallery_sd_b')->nullable();
            $table->string('gallery_sd_c')->nullable();
            $table->string('gallery_sd_d')->nullable();
            $table->string('gallery_sd_e')->nullable();
            $table->string('gallery_sd_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sd');
    }
};
