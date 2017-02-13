<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireRequestItemProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_request_item_properties', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('plant_hire_rq_id')->unsigned()->index();
            $table->integer('properties_item_id')->unsigned()->index();
            $table->integer('d_properties_id')->unsigned()->index();
            $table->string('type');
            $table->text('description')->nullable(true);

            $table->timestamps();

            $table->foreign('plant_hire_rq_id')->references('id')->on('plant_hire_requests')->onDelete('cascade');
            $table->foreign('properties_item_id')->references('id')->on('plant_hire_request_items')->onDelete('cascade');
            $table->foreign('d_properties_id')->references('id')->on('plant_hire_dynamic_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_hire_request_item_properties');
    }
}
