<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_projects', function (Blueprint $table) {
            $table->increments('id') -> unsigned();
            $table->integer('sub_category_id') -> unsigned() -> index();
            $table->string('name');
            $table->text('detail');
            $table->string('main_image');
            $table->boolean('visibility');
            $table->boolean('featured');
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
        Schema::dropIfExists('sub_projects');
    }
}
