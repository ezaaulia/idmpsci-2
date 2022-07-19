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
            $table->unsignedBigInteger('data_siswas_nis');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->integer('nilai_tes_mtk');
            $table->integer('nilai_tes_ipa');
            $table->integer('nilai_tes_agama');
            $table->integer('nilai_tes_bindo');
            $table->timestamps();

            $table->foreign('data_siswas_nis')->references('nis')->on('data_siswas');
            $table->foreign('users_id')->references('id')->on('users');
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
