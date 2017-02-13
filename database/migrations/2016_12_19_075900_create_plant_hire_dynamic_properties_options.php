<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireDynamicPropertiesOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_dynamic_properties_options', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('ph_dynamic_id')->unsigned()->index();
            $table->string('option');
            
            $table->timestamps();

            $table->foreign('ph_dynamic_id')->references('id')->on('plant_hire_dynamic_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_hire_dynamic_properties_options');
    }
}
