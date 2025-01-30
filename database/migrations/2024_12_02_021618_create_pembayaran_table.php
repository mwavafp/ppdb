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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_bayar'); // Primary key
            $table->unsignedBigInteger('id_user');
            $table->enum('byr_dft_ulang', ['lunas', 'belum'])->default('belum'); // Status pembayaran (wajib diisi)
            $table->enum('status', ['Cicil', 'DP', 'Lunas'])->default('DP'); // Status pembayaran (wajib diisi)
            $table->integer('jmlh_byr')->nullable(); // Jumlah pembayaran (wajib diisi)
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
