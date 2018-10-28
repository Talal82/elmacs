<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_icons', function (Blueprint $table) {
            $table->increments('id') -> unsigned();
            $table->string('youtube_link') -> nullable();
            $table->string('facebook_link') -> nullable();
            $table->string('linkedin_link') -> nullable();
            $table->string('pinterest_link') -> nullable();
            $table->string('twitter_link') -> nullable();
            $table->string('instagram_link') -> nullable();
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
        Schema::dropIfExists('social_icons');
    }
}
