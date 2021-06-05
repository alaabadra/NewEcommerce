<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsAttrsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attrs_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('product_attribute_id');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('product_attr_quantity')->default(1);
            $table->integer('product_attr_total')->default(0);

            // $table->string('sub_total');
            // $table->string('total');
            // $table->string('tax');
            // $table->string('cart_color');
            // $table->tinyInteger('cart_status')->default(0);
            // $table->string('cart_size');
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
        Schema::dropIfExists('products_attrs_user');
    }
}
