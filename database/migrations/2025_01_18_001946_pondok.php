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
        Schema::create('pondok', function (Blueprint $table) {
            $table->id('id_pondok');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_pondok')->nullable();
            $table->string('gallery_pondok_a')->nullable();
            $table->string('gallery_pondok_b')->nullable();
            $table->string('gallery_pondok_c')->nullable();
            $table->string('gallery_pondok_d')->nullable();
            $table->string('gallery_pondok_e')->nullable();
            $table->string('gallery_pondok_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pondok');
    }
};
