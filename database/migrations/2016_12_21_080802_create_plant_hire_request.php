<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_requests', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenants_id')->unsigned()->index();
            $table->integer('states_id')->unsigned()->index();
            $table->integer('regions_id')->unsigned()->index();
            $table->string('suburb')->nullable(true);
            $table->string('post_code')->nullable(true);
            $table->text('street_address');
            $table->string('duration');
            $table->text('description');
            $table->date('exp_date');

            $table->timestamps();

            $table->foreign('tenants_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('regions_id')->references('id')->on('regions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_hire_requests');
    }
}
