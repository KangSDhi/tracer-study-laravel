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
        Schema::create('detail_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respon_id')
                ->constrained('respon_tracer')
                ->cascadeOnDelete();

            $table->string('nama_perusahaan', 200);
            $table->string('bidang_usaha', 150)->nullable();
            $table->string('posisi_jabatan', 150)->nullable();
            $table->string('lokasi_kerja_kota', 100)->nullable();
            $table->string('lokasi_kerja_provinsi', 100)->nullable();
            $table->enum('status_kepegawaian', [
                'tetap', 'kontrak', 'magang', 'harian_lepas', 'freelance',
            ]);
            $table->date('tanggal_mulai_kerja')->nullable();
            $table->enum('rentang_gaji', [
                '<1jt', '1-2jt', '2-3jt', '3-5jt', '5-10jt', '>10jt',
            ])->nullable();
            $table->integer('waktu_tunggu_bulan')->nullable()
                ->comment('jumlah bulan dari lulus sampai dapat kerja pertama');
            $table->enum('jalur_mendapat_kerja', [
                'BKK_sekolah', 'mandiri_lamaran', 'rekomendasi_guru',
                'rekomendasi_keluarga', 'magang_prakerin_lanjut', 'lainnya',
            ])->nullable();
            $table->enum('relevansi_bidang', [
                'sangat_relevan', 'relevan', 'cukup_relevan', 'tidak_relevan',
            ]);
            $table->timestamps();

            $table->index('relevansi_bidang', 'idx_pekerjaan_relevansi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pekerjaan');
    }
};
