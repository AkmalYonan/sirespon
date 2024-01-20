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
            $table->enum('klasifikasi', ['pengaduan', 'laporan']);
            $table->string('id_kategori');
            $table->string('id_instansi');
            $table->string('id_tujuan_laporan');
            $table->string('judul');
            $table->string('desc');
            $table->date('date');
            $table->string('lokasi');
            $table->integer('id_lampiran');
            $table->enum('status', ['rahasia', 'publik'])->default('publik');
            $table->enum('status_pengirim', ['anonim', 'publik'])->default('publik');
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
