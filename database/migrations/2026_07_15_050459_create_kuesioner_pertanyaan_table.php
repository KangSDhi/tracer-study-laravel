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
        Schema::create('kuesioner_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')
                ->constrained('periode_tracer');

            $table->string('kode', 20);
            $table->text('teks_pertanyaan');
            $table->enum('tipe_jawaban', [
                'pilihan_ganda', 'isian_singkat', 'skala_1_5', 'ya_tidak',
            ]);
            $table->string('kategori', 100)->nullable()
                ->comment('mis. relevansi_kurikulum, kepuasan_alumni');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_pertanyaan');
    }
};
