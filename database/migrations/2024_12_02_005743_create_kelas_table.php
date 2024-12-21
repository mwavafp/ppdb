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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->enum('unt_pendidikan',['tk','sd','smp','sma','tpq','madin','pondok']);
            $table->enum('kelas',['-','1','2','3','4','5','6', '7', '8', '9', '10','11', '12'])->nullable();
            $table->enum('kls_identitas',['-','A','B','C','D','E','F'])->nullable();
            $table->enum('kls_status',['Belum Ditentukan', 'Lolos', 'Tidak Lolos']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
