<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHirerRequestItemCbDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirer_request_item_cb_datas', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('rq_item_id')->unsigned()->index();
            $table->integer('d_p_id')->unsigned()->index();
            $table->integer('checked')->unsigned()->index();

            $table->timestamps();

            $table->foreign('rq_item_id')->references('id')->on('hirer_request_item_properties')->onDelete('cascade');
            ///$table->foreign('d_p_id')->references('id')->on('plant_hire_dynamic_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirer_request_item_cb_datas');
    }
}
