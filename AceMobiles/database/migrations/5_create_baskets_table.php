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
        Schema::dropIfExists('baskets'); //drop table if exists

        // create baskets table
        Schema::create('baskets', function (Blueprint $table) {
            $table->id('basketID')->autoIncrement(); // primary key
            $table->unsignedBigInteger('userIDFK'); //foreign key
            $table->unsignedBigInteger('productIDFK'); //foreign key
            $table->integer('quantity');
            $table->integer('totalPrice');

            $table->foreign('userIDFK') // link to users table
                ->references('userID')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('productIDFK') // link to products table
                ->references('productID')
                ->on('products')
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
        Schema::dropIfExists('baskets');
    }
};
