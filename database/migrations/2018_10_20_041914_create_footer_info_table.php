<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('footer_info', function (Blueprint $table) {
            $table->increments('id') -> unsigned();
            $table->string('logo');
            $table->text('detail');
            $table->string('contact_title');
            $table->text('contact_detail');
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
        Schema::dropIfExists('footer_info');
    }
}
