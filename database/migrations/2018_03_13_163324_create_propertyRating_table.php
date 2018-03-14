<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertyRating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('moneyWorth');
            $table->integer('safetyWorth');
            $table->integer('facilities');
            $table->integer('value');
            $table->integer('accessibility');
            $table->integer('density');
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
        Schema::dropIfExists('propertyRating');
    }
}
