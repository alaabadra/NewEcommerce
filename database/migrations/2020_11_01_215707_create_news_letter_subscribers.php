<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterSubscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_letter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->tinyInteger('newsletter_subscriber_status')->default(0);
            $table->string('news_letter_subscriber_status')->default('Active');
           
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
        Schema::dropIfExists('news_letter_subscribers');
    }
}
