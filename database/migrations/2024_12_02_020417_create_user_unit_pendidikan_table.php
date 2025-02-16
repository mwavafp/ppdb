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
        Schema::create('user_unit_pendidikan', function (Blueprint $table) {
            $table->id('id_uup');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kelas');

            $table->enum('status', ['Alumni', 'Siswa Aktif', 'Siswa Tidak Aktif'])->default('Alumni');
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_berakhir')->nullable();
            $table->timestamps();


            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_unit_pendidikan');
    }
};
