<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('product_attr_price');
            $table->integer('product_attr_description');
            $table->integer('product_attr_quantity')->default(1);
            $table->string('product_attr_name')->nullable();
            $table->string('product_attr_image')->nullable();
            $table->string('product_attr_status')->default('Active');
            $table->tinyInteger('product_feature')->default(0);
            $table->tinyInteger('product_popular')->default(0);
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
        Schema::dropIfExists('product_attributes');
    }
}
