<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireRequestItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_request_items', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('plant_hire_rq_id')->unsigned()->index();
            $table->integer('properties_id')->unsigned()->index();
            $table->text('description')->nullable(true);

            $table->timestamps();

            $table->foreign('plant_hire_rq_id')->references('id')->on('plant_hire_requests')->onDelete('cascade');
            $table->foreign('properties_id')->references('id')->on('plant_hire_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_hire_request_items');
    }
}
