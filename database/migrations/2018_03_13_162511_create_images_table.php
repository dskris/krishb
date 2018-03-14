<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mainCategoryID')->unsigned();
            $table->integer('subCategoryID')->unsigned();
            $table->string('path', 900);
            $table->foreign('mainCategoryID')->references('id')->on('imagesMainCategory');
            $table->foreign('subCategoryID')->references('id')->on('imagesSubCategory');
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
        Schema::dropIfExists('images');
    }
}
