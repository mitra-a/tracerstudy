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
        Schema::create('kuesioner_jawaban', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('nama');
            $table->string('nim');
            $table->string('prodi');

            $table->string('type');
            $table->string('kuesioner_id');
            $table->string('soal_id');
            $table->string('jawaban');
            $table->boolean('validasi')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_jawaban');
    }
};
