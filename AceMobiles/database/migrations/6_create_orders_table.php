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
        Schema::dropIfExists('orders'); //drop table if exists

        // create orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderID')->autoIncrement(); // primary key
            $table->unsignedBigInteger('userIDFK'); //foreign key
            $table->date('orderDate');
            $table->date('arrivalDate');
            $table->string('status');


            $table->foreign('userIDFK') // link to users table
                ->references('userID')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
