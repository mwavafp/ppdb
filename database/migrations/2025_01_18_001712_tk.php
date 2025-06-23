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
        Schema::create('tk', function (Blueprint $table) {
            $table->id('id_tk');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->string('image_tk')->nullable();
            $table->string('gallery_tk_a')->nullable();
            $table->string('gallery_tk_b')->nullable();
            $table->string('gallery_tk_c')->nullable();
            $table->string('gallery_tk_d')->nullable();
            $table->string('gallery_tk_e')->nullable();
            $table->string('gallery_tk_f')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tk');
    }
};
