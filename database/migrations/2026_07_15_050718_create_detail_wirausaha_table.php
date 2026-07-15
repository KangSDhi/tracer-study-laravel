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
        Schema::create('detail_wirausaha', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respon_id')
                ->constrained('respon_tracer')
                ->cascadeOnDelete();

            $table->string('nama_usaha', 200);
            $table->string('bidang_usaha', 150)->nullable();
            $table->year('tahun_mulai_usaha')->nullable();
            $table->integer('jumlah_karyawan')->default(0);
            $table->enum('rentang_omzet_bulan', [
                '<1jt', '1-5jt', '5-10jt', '10-50jt', '>50jt',
            ])->nullable();
            $table->enum('relevansi_bidang', [
                'sangat_relevan', 'relevan', 'cukup_relevan', 'tidak_relevan',
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_wirausaha');
    }
};
