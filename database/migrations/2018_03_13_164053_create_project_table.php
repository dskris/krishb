<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('location', 500);
            $table->string('tenure', 500);
            $table->integer('projectStatusID')->unsigned();
            $table->string('type', 100);
            $table->integer('price');
            $table->decimal('builtSize', 20, 2);
            $table->integer('storeyNo');
            $table->integer('furnishingStatus')->unsigned();
            $table->integer('unitNo');
            $table->integer('passengerLiftNo');
            $table->integer('serviceLiftNo');
            $table->integer('locationMapID')->unsigned();
            $table->text('description');
            $table->integer('bedroomNo');
            $table->integer('bathroomNo');
            $table->text('listingDescription');
            $table->integer('facilitiesID')->unsigned();
            $table->string('address', 100);
            $table->string('GPSCoordinates', 700);
            $table->integer('floorplanID')->unsigned();
            $table->integer('listingImageID')->unsigned();
            $table->integer('salesGalleryID')->unsigned();
            $table->integer('propertyRatingID')->unsigned();
            $table->boolean('status')->default(true);
            $table->foreign('projectStatusID')->references('id')->on('projectStatus');
            $table->foreign('floorplanID')->references('id')->on('images');
            $table->foreign('listingImageID')->references('id')->on('images');
            $table->foreign('locationMapID')->references('id')->on('images');
            $table->foreign('propertyRatingID')->references('id')->on('propertyRating');
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
        Schema::dropIfExists('project');
    }
}
