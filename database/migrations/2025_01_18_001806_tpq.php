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
        Schema::create('tpq', function (Blueprint $table) {
            $table->id('id_tpq');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_tpq')->nullable();
            $table->string('gallery_tpq_a')->nullable();
            $table->string('gallery_tpq_b')->nullable();
            $table->string('gallery_tpq_c')->nullable();
            $table->string('gallery_tpq_d')->nullable();
            $table->string('gallery_tpq_e')->nullable();
            $table->string('gallery_tpq_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tpq');
    }
};
