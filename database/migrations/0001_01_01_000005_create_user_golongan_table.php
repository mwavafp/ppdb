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
        Schema::create('user_golongan', function (Blueprint $table) {
            $table->id('id_ug');

            $table->unsignedBigInteger('id_acara');
            $table->unsignedBigInteger('id_harga');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_acara')->references('id_acara')->on('acara')->onDelete('cascade');
            $table->foreign('id_harga')->references('id_harga')->on('harga')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_golongan');
    }
};
