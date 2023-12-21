<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');            
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('password');
            $table->enum('role', ['admin', 'operator'])->default('admin');
            $table->rememberToken();
            $table->timestamps();


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
        Schema::dropIfExists('roles');
    }
}
