<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',400);
            $table->string('state',100);
            $table->string('branch',100);
            $table->integer('employeeCategoryID')->unsigned();
            $table->text('biography');
            $table->boolean('status')->default(true);
            $table->foreign('employeeCategoryID')->references('id')->on('employeeCategory');
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
        Schema::dropIfExists('employees');
    }
}
