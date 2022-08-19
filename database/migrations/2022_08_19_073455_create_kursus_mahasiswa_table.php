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
        Schema::create('kursus_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('id_jadwal');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal');
            $table->unsignedSmallInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursus_mahasiswa');
    }
};
