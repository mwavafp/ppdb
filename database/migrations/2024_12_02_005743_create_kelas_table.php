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
            $table->string('name');
            $table->enum('unt_pendidikan',['tk','sd','smp','sma','tpq','madin','pondok']);
            $table->enum('kelas',['-','1','2','3','4','5','6']);
            $table->enum('kls_identitas',['-','A','B','C','D','E','F']);
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
