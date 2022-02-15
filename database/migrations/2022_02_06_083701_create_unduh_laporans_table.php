<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnduhLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unduh_laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_trainings_id');
            $table->dateTime('tgl_laporan');
            $table->string('judul_laporan');
            $table->string('download');
            $table->timestamps();

            // $table->foreign('hasil_trainings_id')->references('id')->on('hasil_trainings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unduh_laporans');
    }
}
