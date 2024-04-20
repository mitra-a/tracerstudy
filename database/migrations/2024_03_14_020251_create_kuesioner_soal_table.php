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
        Schema::create('kuesioner_soal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kuesioner_id');
            $table->string('kuesioner_halaman_id');

            $table->string('pertanyaan');
            $table->text('type');
            $table->text('opsi_x')->nullable();
            $table->text('opsi_y')->nullable();
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_soal');
    }
};
