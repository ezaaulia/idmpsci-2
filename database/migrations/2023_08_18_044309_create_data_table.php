<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string('nama');
            $table->string('asal');
            $table->integer('nilai_tes_mtk');
            $table->integer('nilai_tes_ipa');
            $table->integer('nilai_tes_agama');
            $table->integer('nilai_tes_bindo');
            $table->enum('status_kelas', ['reguler', 'ci']);
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
        Schema::dropIfExists('data');
        Schema::dropIfExists('data_siswas');
        Schema::dropIfExists('nilai_tes');
    }
}
