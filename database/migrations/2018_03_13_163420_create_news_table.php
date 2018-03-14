<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->date('newsDate');
            $table->string('newsLocation',600);
            $table->longText('fullNews');
            $table->integer('videosID')->unsigned();
            $table->integer('imageID')->unsigned();
            $table->boolean('status')->default(true);
            $table->foreign('videosID')->references('id')->on('videos');
            $table->foreign('imageID')->references('id')->on('images');
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
        Schema::dropIfExists('news');
    }
}
