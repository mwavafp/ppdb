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

        Schema::create('sma', function (Blueprint $table) {
            $table->id('id_sma');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_sma')->nullable();
            $table->string('gallery_sma_a')->nullable();
            $table->string('gallery_sma_b')->nullable();
            $table->string('gallery_sma_c')->nullable();
            $table->string('gallery_sma_d')->nullable();
            $table->string('gallery_sma_e')->nullable();
            $table->string('gallery_sma_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sma');
    }
};
