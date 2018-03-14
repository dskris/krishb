<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHbfamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hbfamily', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',500);
            $table->datetime('dateTime');
            $table->string('location',500);
            $table->longText('description');
            $table->integer('imageID')->unsigned();
            $table->integer('videoID')->unsigned();
            $table->integer('categoryID')->unsigned();
            $table->boolean('status')->default(true);
            $table->foreign('imageID')->references('id')->on('images');
            $table->foreign('videoID')->references('id')->on('images');
            $table->foreign('categoryID')->references('id')->on('category');
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
        Schema::dropIfExists('hbfamily');
    }
}
