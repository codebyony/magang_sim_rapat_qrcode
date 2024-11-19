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
        Schema::create('divisis_rapats', function (Blueprint $table) {
            $table->id();
            $table->date('waktu_kirim_undangan');
            $table->timestamps();

            # Relasi
            $table->unsignedBigInteger('rapat_id');
            $table->foreign('rapat_id')->references('id')->on('rapats')->onDelete('cascade');
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
        Schema::dropIfExists('divisis_rapats');
    }
};
