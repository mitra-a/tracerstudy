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
        Schema::create('kuesioner_jawaban_y', function (Blueprint $table) {
            $table->string('jawaban_x_id');
            $table->string('jawaban');
            $table->timestamps();
        });

        Schema::table('kuesioner_jawaban_y', function($table) {
            $table->foreign('jawaban_x_id')->references('id')->on('kuesioner_jawaban_x')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_jawaban_y');
    }
};
