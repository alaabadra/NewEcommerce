<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponcodesProductsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couponcodes_products_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_attribute_id');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('couponcode_id');
            $table->foreign('couponcode_id')->references('id')->on('couponcodes')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('couponcodes_products_attributes');
    }
}
