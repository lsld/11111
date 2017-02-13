<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHireRequestItemTextDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_hire_request_item_text_datas', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('ph_rq_item_id')->unsigned()->index();
            $table->integer('d_p_id')->unsigned()->index();
            $table->string('value')->nullable(true);

            $table->timestamps();

            $table->foreign('ph_rq_item_id')->references('id')->on('plant_hire_request_item_properties')->onDelete('cascade');
            $table->foreign('d_p_id')->references('id')->on('plant_hire_dynamic_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_hire_request_item_text_datas');
    }
}
