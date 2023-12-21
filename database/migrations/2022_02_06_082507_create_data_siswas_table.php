<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('nilai_tes_id');
            $table->integer('nis')->unique();
            $table->string('nama');
            $table->string('asal');
            $table->string('nilai_tes_mtk');
            $table->string('nilai_tes_ipa');
            $table->string('nilai_tes_agama');
            $table->string('nilai_tes_bindo');
            $table->enum('status_kelas', ['reguler', 'ci']);
            // $table->string('hasil_mining')->nullable();
            $table->timestamps();

            //$table->foreign('nilai_tes_id')->references('id')->on('nilai_tes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_siswas');
    }
}
