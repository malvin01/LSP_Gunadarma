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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->smallIncrements('id_jadwal');
            $table->unsignedSmallInteger('id_kursus');
            $table->foreign('id_kursus')->references('id_kursus')->on('kursus');
            $table->date('waktu_kursus');
            $table->tinyInteger('lama_kursus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};
