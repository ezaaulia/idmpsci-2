<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_tes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_siswas_id');
            $table->string('nilai_tes_mtk');
            $table->string('nilai_tes_ipa');
            $table->string('nilai_tes_agama');
            $table->string('nilai_tes_bindo');
            $table->enum('kelas', ['reguler', 'ci']);
            $table->timestamps();

            $table->foreign('data_siswas_id')->references('id')->on('data_siswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_tes');
    }
}
