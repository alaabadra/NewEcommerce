<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_price')->nullable();
            $table->integer('product_description');
            $table->string('product_quantity')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_status')->default('Active');
            $table->tinyInteger('product_the_best')->default(0);
            $table->tinyInteger('product_the_more_sale')->default(0);
            $table->tinyInteger('product_feature')->default(0);
            $table->tinyInteger('product_popular')->default(0);
            $table->tinyInteger('product_modern')->default(0);
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
        Schema::dropIfExists('products');
    }
}
