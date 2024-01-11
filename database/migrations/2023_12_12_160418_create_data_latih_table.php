<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLatihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_latih', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_tes_mtk');
            $table->string('nilai_tes_ipa');
            $table->string('nilai_tes_agama');
            $table->string('nilai_tes_bindo');
            $table->string('hasil_mining');
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
        Schema::dropIfExists('data_latih');
    }
}
