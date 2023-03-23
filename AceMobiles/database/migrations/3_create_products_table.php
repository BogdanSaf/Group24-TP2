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
        Schema::dropIfExists('products'); //drop table if exists

        // create products table
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID')->autoIncrement(); // primary key
            $table->string('productBrand');
            $table->string('productName');
            $table->string('productDescription');
            $table->integer('productPrice');
            $table->integer('productStock');
            $table->string('productImage');
            $table->int('productSold');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
