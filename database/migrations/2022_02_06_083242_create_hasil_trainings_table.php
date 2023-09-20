<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_tes_id');
            // $table->integer('nis');
            // $table->string('nama');
            // $table->string('asal');
            // $table->enum('status_kelas', ['reguler', 'ci']);
            $table->string('hasilmd');
            $table->timestamps();

            $table->foreign('data_siswas_id')->references('id')->on('data_siswas');
            $table->foreign('nilai_tes_id')->references('id')->on('nilai_tes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_trainings');
    }
}
