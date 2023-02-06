<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users'); //drop table if exists

        // create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID')->autoIncrement(); // primary key
            $table->string('firstName');
            $table->string('surname');
            $table->string('address');
            $table->string('postcode'); 
            $table->integer('phoneNumber');
            $table->string('email')->unique();
            $table->string('password');
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
};
