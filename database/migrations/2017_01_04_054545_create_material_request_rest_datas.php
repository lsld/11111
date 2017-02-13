<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialRequestRestDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_request_rest_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->unsigned()->index();
            $table->integer('resource_type')->unsigned()->index();
            $table->integer('condition')->default(0)->comment('Yes or No');
            $table->float('quantity');

            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('job_requests')->onDelete('cascade');
            $table->foreign('resource_type')->references('id')->on('material_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_request_rest_datas');
    }
}
