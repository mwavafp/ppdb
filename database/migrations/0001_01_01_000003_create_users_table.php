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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('password2')->nullable();
            $table->string('name')->nullable();
            $table->string('alamat', 300)->nullable();
            $table->string('nisn', 10)->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('tmpt_lahir', 100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('asl_sekolah', 200)->nullable();
            $table->enum('tipe_siswa', ['alumni', 'umum']);
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('tidak_aktif');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
