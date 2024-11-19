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
        Schema::create('rapats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('deskripsi');
            $table->string('tempat');
            $table->string('jenis');
            $table->string('judul_materi');
            $table->string('deskripsi_materi');
            $table->string('file_materi');
            $table->string('link_absensi');
            $table->string('password');
            $table->timestamps();

            # Relasi
            $table->unsignedBigInteger('divisi_id');
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapats');
    }
};
