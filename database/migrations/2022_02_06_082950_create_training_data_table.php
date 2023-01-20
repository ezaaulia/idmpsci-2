<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('nilai_tes_id');
            $table->string('entropy');
            $table->string('information_gain');
            $table->string('split_information');
            $table->string('gain_ratio');
            $table->enum('ketepatan', ['benar', 'salah']);
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('training_data');
    }
}
