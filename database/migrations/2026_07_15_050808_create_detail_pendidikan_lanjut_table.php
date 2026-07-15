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
        Schema::create('detail_pendidikan_lanjut', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respon_id')
                ->constrained('respon_tracer')
                ->cascadeOnDelete();

            $table->string('nama_perguruan_tinggi', 200);
            $table->string('program_studi', 150)->nullable();
            $table->enum('jenjang', ['D1', 'D2', 'D3', 'D4', 'S1']);
            $table->year('tahun_masuk')->nullable();
            $table->enum('sumber_biaya', [
                'mandiri', 'beasiswa_pemerintah', 'beasiswa_swasta', 'ikatan_dinas',
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pendidikan_lanjut');
    }
};
