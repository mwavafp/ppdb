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
        Schema::create('acara', function (Blueprint $table) {
            $table->id('id_acara');

            $table->string('namaAcara')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif']);

            $table->date('awal_acara')->nullable();
            $table->date('akhir_acara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acara');
    }
};
