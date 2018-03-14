<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('tenure', 500);
            $table->integer('saleStatusID')->unsigned();
            $table->string('type', 100);
            $table->integer('price');
            $table->decimal('builtSize', 20, 2);
            $table->decimal('landSize', 20, 2);
            $table->integer('furnishingStatus')->unsigned();
            $table->integer('bedroomNo');
            $table->integer('bathroomNo');
            $table->text('listingDescription');
            $table->integer('facilitiesID')->unsigned();
            $table->integer('amenitiesID')->unsigned();
            $table->string('address', 100);
            $table->string('GPSCoordinates', 700);
            $table->integer('floorplanID')->unsigned();
            $table->integer('listingImageID')->unsigned();
            $table->integer('agentID')->unsigned();
            $table->boolean('status')->default(true);
            $table->foreign('saleStatusID')->references('id')->on('saleStatus');
            $table->foreign('amenitiesID')->references('id')->on('amenities');
            $table->foreign('facilitiesID')->references('id')->on('facilities');
            $table->foreign('floorplanID')->references('id')->on('images');
            $table->foreign('listingImageID')->references('id')->on('images');
            $table->foreign('agentID')->references('id')->on('agent');
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
        Schema::dropIfExists('property');
    }
}
