<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireDynamicProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_dynamic_properties', function (Blueprint $table) {

            $table->increments('id');
            $table->string('label');
            $table->string('type');
            $table->string('default_value')->nullable();
            $table->string('status');
            $table->string('required')->nullable();
            $table->integer('plant_hire_id')->unsigned()->index();

            $table->foreign('plant_hire_id')->references('id')->on('plant_hire_properties')->onDelete('cascade');

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
        Schema::dropIfExists('plant_hire_dynamic_properties');
    }
}
