<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilminingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilmining', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_testing_id');
            $table->string('hasil')->nullable();
            $table->timestamps();

            $table->foreign('data_testing_id')->references('id')->on('data_testing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasilmining');
    }
}
