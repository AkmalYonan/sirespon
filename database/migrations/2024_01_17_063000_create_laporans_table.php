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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('id_lacak')->unique();
            $table->string('email_pembuat')->nullable();
            $table->string('nama_pelapor')->nullable();
            $table->enum('klasifikasi', ['pengaduan', 'laporan'])->default('laporan');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('instansi_id')->constrained('instansis')->onDelete('cascade');
            $table->string('judul');
            $table->text('desc');
            $table->date('date');
            $table->string('lokasi')->nullable();
            $table->string('lampiran')->nullable();
            $table->enum('status', ['rahasia', 'publik'])->default('publik');
            $table->enum('status_pengirim', ['anonim', 'publik'])->default('publik');
            $table->enum('status_laporan', ['menunggu', 'proses', 'selesai', 'ditolak'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
