<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 300);
            $table->integer('minimumWorkExperience');
            $table->string('state', 900);
            $table->integer('countryID')->unsigned();
            $table->longText('responsibilities');
            $table->string('workLocation', 400);
            $table->integer('jobLevelID')->unsigned();
            $table->boolean('status')->default(true);
            $table->foreign('countryID')->references('id')->on('country');
            $table->foreign('jobLevelID')->references('id')->on('jobLevel');
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
        Schema::dropIfExists('job');
    }
}
