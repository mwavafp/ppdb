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
            $table->enum('byr_dft_ulang', ['lunas', 'belum']); // Status pembayaran (wajib diisi)
            $table->enum('status', ['cicil', 'DP', 'Lunas']); // Status pembayaran (wajib diisi)
            $table->integer('jmlh_byr'); // Jumlah pembayaran (wajib diisi)
            $table->foreignId('fk_user')->default(1)->constrained('users')->cascadeOnDelete();
            $table->timestamps();
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
