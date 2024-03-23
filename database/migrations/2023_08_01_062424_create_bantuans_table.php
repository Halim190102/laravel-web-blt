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
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penduduk');
            $table->enum('kepemilikan_rumah', ['0', '1', '2']);
            $table->enum('bahan_bakar', ['0', '1', '2']);
            $table->enum('tegangan_listrik', ['0', '1', '2']);
            $table->enum('jenis_bangunan', ['0', '1', '2']);
            $table->integer('jumlah_tanggungan');
            $table->enum('penyakit_tahunan', ['0', '1', '2', '3']);
            $table->integer('pendapatan_perbulan');
            $table->integer('pengeluaran_perbulan');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('surat_miskin');
            $table->string('foto_rumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
