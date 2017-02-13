<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePropertyDynamic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_property_dynamics', function (Blueprint $table) {

            $table->increments('id');
            $table->string('label');
            $table->string('type');
            $table->string('measure')->nullable();
            $table->string('default_value')->nullable();
            $table->string('required')->nullable();
            $table->string('status');
            $table->integer('service_property_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('service_property_id')->references('id')->on('service_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_property_dynamics');
    }
}
