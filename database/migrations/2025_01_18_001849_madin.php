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
        Schema::create('madin', function (Blueprint $table) {
            $table->id('id_madin');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_madin')->nullable();
            $table->string('gallery_madin_a')->nullable();
            $table->string('gallery_madin_b')->nullable();
            $table->string('gallery_madin_c')->nullable();
            $table->string('gallery_madin_d')->nullable();
            $table->string('gallery_madin_e')->nullable();
            $table->string('gallery_madin_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('madin');
    }
};
