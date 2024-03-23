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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nik');
            $table->string('alamat');
            $table->string('dusun');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->bigInteger('no_hp');
            $table->enum('pekerjaan', ['0', '1', '2', '3', '4', '5']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['0', '1', '2', '3', '4', '5']);
            $table->enum('status_perkawinan', ['0', '1', '2', '3']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
