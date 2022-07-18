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
            // $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('nilai_tes_id');
            $table->string('nama');
            $table->string('status_kelas');
            $table->timestamps();

            // $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('data_siswas');
    }
}
