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
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nomor_telepon')->nullable();

            $table->string('role');

            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten_kota')->nullable();

            $table->string('prodi')->nullable();
            $table->string('periode')->nullable();

            $table->string('tempat_kerja')->nullable();
            $table->string('alamat_kerja')->nullable();
            $table->string('foto')->nullable();

            $table->timestamp('email_verified_at')->nullable();
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
