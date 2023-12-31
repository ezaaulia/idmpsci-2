<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('password');
            $table->enum('role', ['admin', 'operator']);
            // $table->boolean('admin')->nullable();
            // 0 = Admin, 1 = Operator
            // $table->tinyInteger('role')->default(0);
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
        Schema::dropIfExists('users');
    }
}
