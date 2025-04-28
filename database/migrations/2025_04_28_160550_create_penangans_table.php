<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penanganans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained('laporans')->onDelete('cascade');
            $table->foreignId('petugas_id')->constrained('petugas_kebersihans')->onDelete('cascade');
            $table->date('tanggal_penanganan')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['Dalam Proses', 'Selesai', 'Butuh Bantuan'])->default('Dalam Proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganans');
    }
};
