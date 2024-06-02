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
            $table->uuid('id')->primary();
            $table->string('nim')->nullable()->unique();
            $table->string('nama');
            $table->string('username')->nullable()->unique();
            $table->string('password');
            $table->string('nomor_telepon')->nullable();
            
            $table->string('role');
            
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('periode')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('aktif')->default(true);

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
