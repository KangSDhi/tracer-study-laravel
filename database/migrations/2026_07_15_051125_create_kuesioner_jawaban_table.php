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
            $table->id();
            $table->foreignId('respon_id')
                ->constrained('respon_tracer')
                ->cascadeOnDelete();
            $table->foreignId('pertanyaan_id')
                ->constrained('kuesioner_pertanyaan');
            $table->foreignId('opsi_id')
                ->nullable()
                ->constrained('kuesioner_opsi_jawaban');

            $table->text('jawaban_teks')->nullable();
            $table->tinyInteger('jawaban_skala')->nullable();
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
