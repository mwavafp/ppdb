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
            $table->string('deskripsi');
            $table->string('keunggulan');
            $table->string('visi');
            $table->string('misi');
            
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
