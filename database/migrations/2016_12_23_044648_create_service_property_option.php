<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePropertyOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_property_options', function (Blueprint $table) {

            $table->increments('id');
            $table->string('option');
            $table->integer('s_d_p_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('s_d_p_id')->references('id')->on('service_property_dynamics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_property_options');
    }
}
