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
        Schema::create('kuesioner_jawaban_x', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jawaban_id');
            $table->string('key');
            $table->string('jawaban');
            $table->timestamps();
        });

        Schema::table('kuesioner_jawaban_x', function($table) {
            $table->foreign('jawaban_id')->references('id')->on('kuesioner_jawaban')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_jawaban_x');
    }
};
