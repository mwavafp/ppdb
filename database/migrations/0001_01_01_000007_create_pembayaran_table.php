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
            $table->enum('byr_dft_ulang', ['lunas', 'belum'])->default('belum'); // Status pembayaran (wajib diisi)
            $table->enum('status', ['Cicil',  'Lunas'])->default('Cicil'); // Status pembayaran (wajib diisi)
            $table->integer('jmlh_byr')->default(0); // Jumlah pembayaran (wajib diisi)
            $table->integer('jmlh_byr2')->default(0); // cicilan
            $table->integer('jmlh_byr3')->default(0); // cicilan
            $table->integer('jmlh_byr4')->default(0); // cicilan
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id_admin')->on('admins')->onDelete('set null');
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
