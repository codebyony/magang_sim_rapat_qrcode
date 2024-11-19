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
        // Schema::create('absensis', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('status');
        //     $table->string('keterangan')->nullable();
        //     $table->timestamps();

        //     # Relasi
        //     $table->unsignedBigInteger('rapat_id');
        //     $table->foreign('rapat_id')->references('id')->on('rapats')->onDelete('cascade');
        //     $table->unsignedBigInteger('karyawan_nip');
        //     $table->foreign('karyawan_nip')->references('NIP')->on('karyawans')->onDelete('cascade');
        // });
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('divisi_instansi');
            $table->string('in_eks_pal');
            
            # Relasi
            $table->unsignedBigInteger('rapat_id');
            $table->foreign('rapat_id')->references('id')->on('rapats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
