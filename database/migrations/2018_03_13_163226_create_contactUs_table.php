<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactUs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',400);
            $table->string('email',100);
            $table->string('phoneNumber',100);
            $table->text('message');
            $table->boolean('status')->default(true);
            $table->integer('futurePromoID');
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
        Schema::dropIfExists('contactUs');
    }
}
