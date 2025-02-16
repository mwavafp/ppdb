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
        Schema::create('harga', function (Blueprint $table) {
            $table->id('id_harga');
            $table->enum('unitPendidikan', ['tk', 'sd', 'smp', 'sma', 'tpq', 'madin', 'pondok']);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('tipe_siswa', ['alumni', 'umum']);
            $table->bigInteger('total_bayar_daful');
            $table->bigInteger('dp_daful');
            $table->bigInteger('diskon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga');
    }
};
