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
        Schema::create('respon_tracer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')
                ->constrained('alumni')
                ->cascadeOnDelete();
            $table->foreignId('periode_id')
                ->constrained('periode_tracer');

            $table->enum('status_utama', [
                'bekerja', 'wirausaha', 'kuliah', 'bekerja_dan_kuliah',
                'belum_bekerja', 'lainnya',
            ]);

            $table->dateTime('tanggal_mengisi')->nullable();

            $table->enum('sumber_isian', [
                'mandiri_online', 'wawancara_telepon', 'kunjungan', 'whatsapp',
            ])->default('mandiri_online');
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['alumni_id', 'periode_id'], 'uq_alumni_periode');
            $table->index('status_utama', 'idx_respon_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respon_tracer');
    }
};
