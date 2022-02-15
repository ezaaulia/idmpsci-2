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
            $table->foreignId('data_siswas_id');
            $table->foreignId('users_id');
            $table->string('nilai_tes_mtk');
            $table->string('nilai_tes_ipa');
            $table->string('nilai_tes_agama');
            $table->string('nilai_tes_bindo');
            $table->timestamps();

            // $table->foreign('data_siswas_id')->references('id')->on('data_siswas');
            // $table->foreign('users_id')->references('id')->on('users');
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