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
        Schema::dropIfExists('basket_order_contents'); //drop table if exists

        // create basketContents table
        Schema::create('basket_order_contents', function (Blueprint $table) {
            $table->id('basketContentID')->autoIncrement(); // primary key
            $table->unsignedBigInteger('orderIDFK'); //foreign key
            $table->unsignedBigInteger('productIDFK');//foreign key
            $table->integer('quantity');

            $table->foreign('productIDFK') // link to products table
                ->references('productID')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('orderIDFK') // link to orders table
                ->references('orderID')
                ->on('orders')
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
        Schema::dropIfExists('basket_contants');
    }
};
