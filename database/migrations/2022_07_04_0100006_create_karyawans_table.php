<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('NIP');
            $table->string('nama');
            $table->string('email');
            $table->string('jabatan');
            $table->timestamps();
            
            # Relasi
            $table->unsignedBigInteger('divisi_id');
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};
